<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Auth;

class NotificationController extends Controller
{
    public function all()
    {
    	$user = Auth::user();

    	$notifications = Notification::where('user_id', $user->id)
            ->whereDoesntHave('users', function ($q) use ($user) { 
                $q->where('user_id', $user->id);
            })
            ->orWhere(function($query) use ($user) {
                $query->whereNull('user_id')
                ->whereDoesntHave('users', function ($q) use ($user) {
                    $q->where('user_id', $user->id);
                });
            })
            ->orderBy('id', 'desc')
    		//->take(10)
    		->get();

        $unRead = Notification::where('user_id', $user->id)
            ->whereDoesntHave('users', function ($q) use ($user) { 
                $q->where('user_id', $user->id);
            })
            ->orWhere(function($query) use ($user) {
                $query->whereNull('user_id')
                ->whereDoesntHave('users', function ($q) use ($user) {
                    $q->where('user_id', $user->id);
                });
            })
            ->count();

    	return [
            'notifications' => $notifications,
            'unRead' => $unRead
        ];
    }
}
