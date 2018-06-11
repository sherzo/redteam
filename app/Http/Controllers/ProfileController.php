<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Area;
use App\Suggestion;
use App\Application;
use App\Emergency;
use Auth;

class ProfileController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', $username)->first();
        $areas = Area::pluck('name', 'id');
        $bosses = User::where('id', '!=', $user->id)->pluck('name', 'id');

        return view('front-end.profile.index', [
        	'user' => $user,
        	'bosses' => $bosses,
        	'areas' => $areas
        ]);

    }

    public function update(Request $request)
    {
    	$user = User::find($request->user_id);
    	if($request->avatar) {
    		//dd($request->all());
    		$avatar = $request->file('avatar');
    		$user->avatar = $avatar->store('avatars', 'public');
    		$user->save();
    	}
    	// Personal information
    	$personal = $user->personal;
    	$personal->address = $request->address;
    	$personal->personal_email = $request->personal_email;
    	$personal->birthdate = $request->birthdate;
    	$personal->save();

    	// Academic information
    	$academic = $user->academic;
    	$academic->technical = $request->technical;
    	$academic->diplomat = $request->diplomat;
    	$academic->postgraduate = $request->postgraduate;
    	$academic->abilities = $request->abilities;
    	$academic->save();

    	// Work iinformation
    	$work = $user->work;
    	$work->phone = $request->phone;
    	$work->extension = $request->extension;
    	$work->save();

    	flash()->success('Se actualizó su perfil correctamente');

    	return redirect('profile/' . $user->username);
    }

    public function process() 
    {
        return view('front-end.profile.process');
    }

    public function applications() 
    {
        $user = Auth::user();

        $applications = Application::where('user_id', $user->id)->get();
        
        $applications->load('discussions.user', 'user');

        return $applications;
    }

    public function suggestions() 
    {
        $user = Auth::user();

        $suggestions = Suggestion::where('user_id', $user->id)->get();
        
        $suggestions->load('discussions.user', 'user');

        return $suggestions;
    }

    public function emergencies() 
    {
        $user = Auth::user();

        $emergencies = Emergency::where('user_id', $user->id)->get();
        
        $emergencies->load('discussions.user', 'user');

        return $emergencies;
    }
}
