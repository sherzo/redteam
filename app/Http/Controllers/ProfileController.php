<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Area;
use App\Suggestion;
use App\Application;
use App\Emergency;
use App\Event;
use Auth;

class ProfileController extends Controller
{
    public function index($username)
    {   
        $user = User::where('username', $username)->first();
        $areas = Area::pluck('name', 'id');
        $today = Event::whereDate('day', now()->format('Y-m-d'))->orderBy('id', 'desc')->first();
        $bosses = User::where('id', '!=', $user->id)->pluck('name', 'id');
            
        $holidays = $user->holidays;

        if($holidays < 10) {
            $firstHoliday = 0;
            $sendcondHoliday = $holidays;
        }else {
            $holidays = str_split($holidays);
            //dd($holidays);
            $firstHoliday = $holidays[0];
            $sendcondHoliday = $holidays[1];
        }

        //dd($firstHoliday, $sendcondHoliday);
        return view('front-end.profile.index', [
        	'user' => $user,
        	'bosses' => $bosses,
        	'areas' => $areas,
            'firstHoliday' => $firstHoliday,
            'sendcondHoliday' => $sendcondHoliday,
            'today' => $today
        ]);
    }

    public function myPublications(Request $request) 
    {
        $user = User::find($request->id);
        
        $publications = $user->publications()->whereNull('color')->orderBy('id', 'desc')->get();
        
        $publications->load('user', 'comments.user', 'likes');
        
        return $publications;
    }

    public function update(Request $request)
    {
    	$user = User::find($request->user_id);
    	if($request->avatar) {
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

    public function galeries(Request $request) 
    {
        $user = User::find($request->id);

        $images = $user->publications()->whereNotNull('image')->take(2)->pluck('image');
    
        return $images;
    }

    
}
