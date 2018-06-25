<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use App\AdminNotification;
use Auth;

class AdminNotificationController extends Controller
{
    public function store(Request $request)
    {
    	$user = Auth::user();

    	$notification = AdminNotification::create([
    		'user_id' => $user->id,
    		'color' => $request->color,
    		'title' => $request->title,
    		'description' => $request->description
    	]);

    	return $notification;
    }

    public function all()
    {
    	$user = Auth::user();

    	$notifications = $user->adminNotifications;

    	return $notifications;
    }

    public function send(Request $request)
    {
        //return $request->all();
        $user = Auth::user();

        $notification = AdminNotification::find($request->id);

        $publication = Publication::create([
            'user_id' => $user->id,
            'color' => $notification->color,
            'description' => $notification->description
        ]);

        return $publication;
    }
}
