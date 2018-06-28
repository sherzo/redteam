<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Assistance;
use App\Performance;
use Carbon\Carbon;
use App\User;

class AssistanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if(!$user->hasRole('admin')) {
            return redirect('/home');
        }

        return view('back-end.assistances.index');
    }

    public function individual($id)
    {
        $user = User::find($id);

        $assistances = $user->assistances()->orderBy('entry', 'DESC')->get();

        return view('back-end.assistances.individual', [
            'assistances' => $assistances, 
            'user' => $user
        ]);
    }

    public function allUsers()
    {
        $users = User::with(['assistances' => function($query){
            $query->orderBy('entry', 'DESC');  
        }])->get();

        return view('back-end.assistances.all', ['users' => $users]);
    }

    public function all() 
    {
        $assistances = Assistance::with('user')->get();
        
        return $assistances;
    }

    public function markEntry()
    {
    	$user = Auth::user();

    	$now = now();

    	$assistance = Assistance::create([
    		'user_id' => $user->id,
    		'entry' => $now
    	]);

    	$schedule = $user->schedules()
    		->join('schedule_days', 'schedules.id', '=', 'schedule_days.schedule_id')
    		->where('day', $now->dayOfWeek)
    		->first();

    	// Fecha en la hora de entrada del usuario
    	if(!is_null($schedule)) {
    		$schedule = new Carbon($now->format('Y-m-d'). ' ' . $schedule->entry);	
    		if($now->gt($schedule)) { // Si es despues llega tarde
    			$assistance->entry_status = false;
    			$assistance->save();
    		}
    	}

    	return $assistance;
    }

    public function markExit()
    {
    	$user = Auth::user();
    	$now = now();

    	$assistance = Assistance::where('user_id', $user->id)->whereNull('exit')->first();
    	$assistance->exit = $now;

    	// Obtengo el hario de ese día
    	$schedule = $user->schedules()
    		->join('schedule_days', 'schedules.id', '=', 'schedule_days.schedule_id')
    		->where('day', $now->dayOfWeek)
    		->first();
    	
    	if(!is_null($schedule)) { // No tiene horario ese día es decir es extra
    		$schedule = new Carbon($now->format('Y-m-d'). ' ' . $schedule->exit);	

    		if($now->lt($schedule)) { // Si la hora de salida es menos que la que tiene en el horario
    			$assistance->exit_status = false;
    		}
    	}

    	$assistance->save();

    	return $assistance;
    }

    public function getWorkStatus() 
    {
    	$now = now();
    	$user = Auth::user();

    	$todayWorking = Assistance::where('user_id', $user->id)
    		->whereDate('created_at', $now->format('Y-m-d'))
    		->exists();

    	if($todayWorking) { // Si el usuario marco hoy

    		$isWorking = Assistance::where('user_id', $user->id)
    			->whereNull('exit')
    			->exists();

	    	return [
	    		'isWorking' => $isWorking // True o False: Esta trabajando | Ya termino el día
	    	];
	    }

    	return [
    		'isWorking' => null // No ha marcado hoy
    	];
    }

    public function adp(Request $request)
    {
        $user = Auth::user();

        $assistance = Assistance::find($request->id);

        $assistance->adp = true;

        $assistance->save();

        $performance = Performance::create([
            'user_id' => $user->id,
            'performance' => 1,
            'operation' => -5
        ]);

        $user->score += $performance->operation;

        if($user->score > 10) { 
            $user->stars = $user->score / 5;
        }

        $user->save();

        return $assistance;
    }

}
