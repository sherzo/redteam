<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Auth::user()->hasRole('admin')) {
            return view('back-end.tasks.index');
        }

        return view('front-end.tasks.index');
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
        $users = collect($request->all());

        $users->each(function($user){
           
            foreach ($user['tasks'] as $key => $t) {

                $task = Task::find($t['id']);
                $task->description = $t['description'];
                $task->save(); 
            
            }

        });

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }

    public function employees(Request $request)
    {
        $boss = Auth::user();

        $employees = $boss->employees;

        $employees->each(function($employee) {
            $employee->accordion = false;
            $tasks = $employee->tasks()
                ->whereDate('created_at', now()->format('Y-m-d'))
                ->get();
                
            if($tasks->count() < 10) {
                for ($i=0; $i < 10; $i++) { 
                    $employee->tasks()->create();
                }
            }

            $employee->load(['tasks' => function($query){
                $query->whereDate('created_at', now()->format('Y-m-d'));
            }]);
        });

        return $employees;
    }

    public function myTasks()
    {
        $user = Auth::user();

        $tasks = $user->tasks()
            ->whereDate('created_at', now()->format('Y-m-d'))
            ->whereNotNull('description')
            ->get();

        return $tasks;
    }

    public function complete(Request $request)
    {
        $task = Task::find($request->id);

        $task->status = !$task->status;

        $task->save();
    }
}
