<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use Auth;
use App\Like;

class PublicationController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

    	$publications = Publication::where('featured', 0)
            ->with(['user', 'likes', 'comments.user'])
            ->orderBy('id', 'DESC');
        
        $personals = Publication::where('featured', 1)
            ->with(['user', 'likes', 'comments.user'])
            ->orderBy('id', 'DESC');

        if($request->offset) {
            $publications = $publications->offset($request->offset);
            $personals = $personals->offset($request->offset);
        }

        $publications = $publications->limit(4)->get();
        $personals = $personals->limit(4)->get();

        $publications->each(function($publication) use ($user){
            $publication->liked = $publication->usersLikes->contains($user);
        });

        $personals->each(function($personal) use ($user){
            $personal->liked = $personal->usersLikes->contains($user);
        });

    	return [
            'publications' => $publications,
            'personals' => $personals
        ];
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
        if($request->liked) {
            $like = Like::where('publication_id', $request->publication_id)
                        ->where('user_id', $user->id)
                        ->first();

            $like->delete();

        }else {

    	   $publication = Publication::find($request->publication_id);
    	   $publication->likes()->create([
    		  'user_id' => $user->id
    	   ]);
        
        }

        return $user;
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
