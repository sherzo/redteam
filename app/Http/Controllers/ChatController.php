<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\User;
use App\Message;
use Auth;

class ChatController extends Controller
{
    public function index()
    {
    	return view('front-end.chats.index');
    }

    public function all()
    {
    	$user = Auth::user();

    	$chats = $user->chats()->get();

    	$chats->load('transmitter', 'receiver');

    	return $chats;
    }


    public function getOrCreate($id)
    {
    	$transmitter = Auth::user();

    	$receiver = User::find($id);

    	$chat = Chat::getOrCreate($transmitter, $receiver);
    
    	return $chat;
    }
    
    public function getMessages($id)
    {
   		$chat = Chat::find($id); 	

    	$messages = $chat->messages()->get();

    	return $messages;
    }

    public function getUsers()
    {
        $users = User::all();

        return $users;
    }
}
