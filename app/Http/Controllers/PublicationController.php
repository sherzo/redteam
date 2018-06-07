<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use Auth;

class PublicationController extends Controller
{
    public function index()
    {
    	$publications = Publication::orderBy('id', 'DESC')->get();

    	$publications->load('user', 'likes', 'comments.user');

    	return $publications;
    }

    public function store(Request $request)
    {
    	$user = Auth::user();

    	$publication = Publication::create([
    		'user_id' => $user->id,
    		'description' => $request->description,
    		'emergency' => json_decode($request->emergency),
    		'featured' => json_decode($request->featured)
    	]);

    	if($request->file) {
    		$file = $request->file('file');
    		$publication->file = $file->store('publications/files', 'public');
    	}

    	if($request->image){
    		$image = $request->file('image');
    		$publication->image = $image->store('publications/images', 'public');
        }

        $publication->save();

    	$publication->load('user', 'comments', 'likes');

    	return $publication;
    }

    public function like(Request $request)
    {
    	$user = Auth::user();

    	$publication = Publication::find($request->publication_id);

    	$publication->likes()->create([
    		'user_id' => $user->id
    	]);

        $publication->load('comments', 'likes');
    	
        return $publication;
    }

    public function comment(Request $request) 
    {
        $user = Auth::user();

        $publication = Publication::find($request->publication_id);

        $publication->comments()->create([
            'user_id' => $user->id,
            'description' => $request->description,
        ]);

        $comments = $publication->comments;
        $comment = $comments->last();
        $comment->load('user');
        return $comment;
    } 
}
