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

    	$chats = $user->chats()->orderBy('updated_at', 'desc')->get();

    	$chats->load('transmitter', 'receiver');

    	return $chats;
    }


    public function getOrCreate($id)
    {
    	$transmitter = Auth::user();

    	$receiver = User::find($id);

    	$chat = Chat::getOrCreate($transmitter, $receiver);
            
        $chat->load('transmitter', 'receiver');

    	return $chat;
    }
    
    public function getMessages($id)
    {
   		$chat = Chat::find($id); 	

    	$messages = $chat->messages()->get();

    	return $messages;
    }

    public function users()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();

        return $users;
    }

    public function sendFile(Request $request)
    {
        $file = $request->file('file');
        
        $url = $file->store('chats/chatfiles' . $request->chat_id, 'public');

        $message = Message::create([
            'type' => $request->type,
            'content' => $url,
            'user_id' => $request->user_id,
            'chat_id' => $request->chat_id
        ]);

        return $message;
    }

    public function delete(Request $request)
    {
        $chat = Chat::find($request->id);

        $chat->delete();

        return [
            'result' => true
        ];
    }
}
