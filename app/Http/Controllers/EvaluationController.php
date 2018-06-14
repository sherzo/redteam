<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;
use Auth;

class EvaluationController extends Controller
{
	public function index()
	{
		return view('front-end.evaluations.index');
	}   

	public function employees()
	{
		$boss = Auth::user();
		$moth = now()->format('m');

		$employees = $boss->employees;

		$employees->each(function($employee) use ($moth) {
			$evaluation = $employee->evaluations()
				->whereMonth('created_at', $moth)
				->exists();

			$employee->evaluation = $evaluation;
		});

		return $employees;
	}
}
