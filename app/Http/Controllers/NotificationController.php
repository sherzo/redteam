<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\User;
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

    public function birthday() 
    {
        $month = now()->format('m');
        $day = now()->format('d');

        $users = User::join('personal_informations', 'users.id', '=', 'personal_informations.user_id')
            ->whereMonth('birthdate', $month)
            ->whereDay('birthdate', $day)
            ->get();

        //return $users;

        foreach ($users as $key => $user) {
            $data = "Hoy es el cumpleaños de <strong class='nameUserNotifique'>". $user->full_name ."</strong>";

            $notification = Notification::create([
                'data' => $data,
                'type' => 4
            ]);
        }
    }
}
