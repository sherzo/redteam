<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reminder;
use Auth;

class ReminderController extends Controller
{
   	public function all()
   	{
   		$user = Auth::user();

   		$reminders = $user->reminders()->whereNull('completed')->get();

   		return $reminders;
   	}

   	public function store(Request $request)
   	{
         $user = Auth::user();

   		$reminder = Reminder::create([
   			'user_id' => $user->id,
   			'title' => $request->title
   		]);

   		return $reminder;
   	}

   	public function markAsCompleted(Request $request)
   	{
   		$reminder = Reminder::find($request->id);

   		$reminder->completed = now();

   		$reminder->save();

   		return $reminder;
   	}
}
