<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;
use Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if($user->hasRole('employee')) {
            return redirect('/application');
        }

        return view('back-end.applications.index');
    }

    public function application()
    {
        return view('front-end.applications.application');
    }

    /*
     * Get all suggestions json.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $applications = Application::orderBy('id', 'desc')
            ->where('read', false)
            ->whereNull('status')
            ->get();

        $applications->load('user', 'discussions.user');

        return $applications;
    }

     /**
     * Get all suggestions json.
     *
     * @return \Illuminate\Http\Response
     */
    public function discussion(Request $request)
    {
        //return $request->all();
        $user = Auth::user();

        $application = Application::find($request->id);

        $application->discussions()->create([
            'description' => $request->description,
            'user_id' => $user->id
        ]);
        
        $discussion = $application->discussions->last();

        if($request->file) {
            $file = $request->file('file');
            $discussion->file = $file->store('applications/discussions/files', 'public');
        }

        if($request->image){
            $image = $request->file('image');
            $discussion->image = $image->store('applications/discussions/images', 'public');
        }

        $discussion->save();
        
        $discussion->load('user');

        return $discussion;
    }

    /**
     * Mark 
     *
     * @return \Illuminate\Http\Response
     */
    public function MarkAsRead(Request $request)
    {
        $applications = Application::whereIn('id', $request->applications_ids)
            ->update(['read' => true]);
        
        return [
            'result' => true
        ]; 
    }

     /**
     * Mark 
     *
     * @return \Illuminate\Http\Response
     */
    public function aceptOrDenied(Request $request)
    {
        $application = Application::find($request->id);

        $application->status = $request->status;

        $application->save();
        
        $application->load('user');

        return $application; 
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
        //return $request->all();
        $user = Auth::user();

        $application = Application::create([
            'user_id' => $user->id,
            'description' => $request->description,
            'date' => $request->date,
            'complete' => $request->complete,
            'discount' => $request->discount
        ]);

        return $application->load('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}
