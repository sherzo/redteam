<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;
use Auth;
use App\User;

class EvaluationController extends Controller
{
	public function index()
	{
		//$user = Auth::user();
		//$employees = $user->employees->count();
		/*if($employees == 0){
			return redirect('home');
		}*/

		return view('front-end.evaluations.index');
	}   

	public function employees()
	{
		$boss = Auth::user();
		$moth = now()->format('m');

		$employees = $boss->employees;

		$employees->each(function($employee) use ($moth) {
			$evaluated = $employee->evaluations()
				->whereMonth('created_at', $moth)
				->exists();

			$employee->evaluated = $evaluated;
		});

		return $employees;
	}

	public function store(Request $request)
	{
		$user = Auth::user();
		
		$average = $request->score / 20;

		$evaluation = Evaluation::create([
			'user_id' => $request->id,
			'score' => $request->score,
			'boss_id' => $user->id,
			'average' => $average
		]);

		$employee = User::find($request->id);
		
		$lastScore = $employee->score;
		
		if($lastScore != null) { // Si ya tiene score

			$newScore = ($lastScore + $evaluation->score) / 2;
		
		}else { // Si es la primera evaluación

			$newScore = $evaluation->score;
		}
		
		$newStars = round($newScore / 20);
		$employee->score = $newScore;
		$employee->stars = $newStars;
		$employee->save();

		return $employee; 
	}
}
