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
            $employee->adp = $adps = Performance::where('user_id', $employee->id)->where('performance', 2)->count();
        }
        $count = $employees->count();
        
        return [
            'employees' => $employees,
            'count' => $count
        ];
    }

    public function addADP(Request $request)
    {
        $employee = User::find($request->user_id);
        $total = 0;
        if ($request->select > 0) {
            $type = 1;
        } else {
            $type = 2;
        }

        $performance = new Performance();
            $performance->user_id = $request->user_id;
            $performance->performance = $type;
            $performance->operation = $request->select;
        $performance->save();


        /*
        * CALCULO DEL SCORE DE LOS USUARIOS
        */

        $performances_user = Performance::where('user_id', $request->user_id)->get();
        foreach ($performances_user as $performance_user) {
            $total = $total + $performance_user->operation;
        }

        $employee->score = $total;
        $stars = round($total/20);
        if ($stars <= 0) {
            $stars = null;
        } else if ($stars >= 5) {
            $stars = 5;
        }
        $employee->stars = $stars;
        $employee->save();

        $employee->adp = Performance::where('user_id', $request->user_id)->where('performance', 2)->count();

        return $employee;
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
