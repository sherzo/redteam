<?php

namespace App\Http\Controllers;

use App\Appication;
use Illuminate\Http\Request;

class AppicationController extends Controller
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
        $applications = Application::orderBy('id', 'desc')->where('read', false)->get();

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

        $application = Application::find($request->emergency_id);

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
     * @param  \App\Appication  $appication
     * @return \Illuminate\Http\Response
     */
    public function show(Appication $appication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appication  $appication
     * @return \Illuminate\Http\Response
     */
    public function edit(Appication $appication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appication  $appication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appication $appication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appication  $appication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appication $appication)
    {
        //
    }
}
