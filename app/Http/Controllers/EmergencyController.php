<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emergency;
use App\Discussion;
use Auth;

class EmergencyController extends Controller
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
            return redirect('/emergency');
        }

        return view('back-end.emergencies.index');
    }

    public function emergency()
    {
        return view('front-end.emergencies.emergency');
    }

    /*
     * Get all suggestions json.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $emergencies = Emergency::orderBy('id', 'desc')->where('read', false)->get();

        $emergencies->load('user', 'discussions.user');

        return $emergencies;
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

        $emergency = Emergency::find($request->id);

        $emergency->discussions()->create([
            'description' => $request->description,
            'user_id' => $user->id
        ]);
        
        $discussion = $emergency->discussions->last();

        if($request->file) {
            $file = $request->file('file');
            $discussion->file = $file->store('emergencies/discussions/files', 'public');
        }

        if($request->image){
            $image = $request->file('image');
            $discussion->image = $image->store('emergencies/discussions/images', 'public');
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
        $emergencies = Emergency::whereIn('id', $request->emergencies_ids)
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
        $user = Auth::user();

        $emergency = Emergency::create([
            'user_id' => $user->id,
            'description' => $request->description,
            'read' => false
        ]);

        if($request->file) {
            $file = $request->file('file');
            $emergency->file = $file->store('emergencies/files', 'public');
        }

        if($request->image){
            $image = $request->file('image');
            $emergency->image = $image->store('emergencies/images', 'public');
        }

        $emergency->save();

        return $emergency->load('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Emergency  $emergency
     * @return \Illuminate\Http\Response
     */
    public function show(Emergency $emergency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Emergency  $emergency
     * @return \Illuminate\Http\Response
     */
    public function edit(Emergency $emergency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Emergency  $emergency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emergency $emergency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Emergency  $emergency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $emergencies = Emergency::whereIn('id', $request->emergencies_ids)
            ->delete();
        
        return [
            'result' => true
        ]; 
    }
}
