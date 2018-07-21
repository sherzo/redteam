<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Evaluation;
use App\Performance;
use Auth;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('back-end.ranking.index');
    }

    public function all() 
    {

        $employees = User::all();
        foreach ($employees as $employee) {
            $employee->select = "";
            $adps = Performance::where('user_id', $employee->id)->where('performance', 2)->count();
            $employee->adp = $adps;
        }
        $count = $employees->count();
        
        return [
            'employees' => $employees,
            'count' => $count
        ];
    }

    public function addADP(Request $request)
    {
        $performances = [-10, 15, 10, 8, 5, -10, -10, -15];
        $operation = $performances[$request->select];

        $employee = User::find($request->user_id);
        $total = 0;

        $performance = new Performance();
            $performance->user_id = $request->user_id;
            $performance->performance = $request->select;
            $performance->operation = $operation;
        $performance->save();

        /*
        * CALCULO DEL SCORE DE LOS USUARIOS
        */
        if($employee->score == null) { // Si es nuevo y no tiene score

            $employee->score = $performance->operation;

        }else {
        
            $employee->score += $performance->operation;                
            
        }

        $newStars = round($employee->score / 20);
        if($newStars > 5) {
            $newStars = 5;
        }

        $employee->stars = $newStars;
        $employee->save();
        
        $employee->adp = Performance::where('user_id', $request->user_id)->where('performance', 2)->count();

        return $employee;
    }

    public function ranking()
    {
        return view('front-end.ranking.index');
    }

    public function employees()
    {
        $employees = User::orderBy('score', 'DESC')->get();
        $first = $employees->shift(0);

        return [
            'first' => $first, 
            'employees' => $employees
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
