<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggestion;
use App\Discussion;
use Auth;

class SuggestionController extends Controller
{
    function __construct() {
        $this->user = Auth::user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
        if($user->hasRole('empleado')) {
            return redirect('/buzon');
        }

        return view('back-end.suggestions.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buzon()
    {
        $user = Auth::user();
                
        return view('front-end.suggestions.buzon');
    }

    /**
     * Get all suggestions json.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $suggestions = Suggestion::orderBy('id', 'desc')->where('read', false)->get();

        $suggestions->load('user', 'discussions.user');

        return $suggestions;
    }

    /**
     * Get all suggestions json.
     *
     * @return \Illuminate\Http\Response
     */
    public function discussion(Request $request)
    {
        $user = Auth::user();

        $suggestion = Suggestion::findOrFail($request->suggestion_id);

        $suggestion->discussions()->create([
            'description' => $request->description,
            'user_id' => $user->id
        ]);

        $discussion = $suggestion->discussions->last();

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
        $suggestions = Suggestion::whereIn('id', $request->suggestions_ids)
            ->update('read', true);
        
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

        $sugestion = Suggestion::create([
            'user_id' => $user->id,
            'description' => $request->description
        ]);

        return $sugestion->load('user');
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
