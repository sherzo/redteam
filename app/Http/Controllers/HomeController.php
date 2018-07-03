<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;
use App\Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recents = Notification::orderBy('id','desc')->take(8)->get();

        $today = Event::whereDate('day', now()->format('Y-m-d'))->orderBy('id', 'desc')->first();

        $ranking = User::orderBy('stars', 'desc')->take(8)->get();
        
        return view('front-end.home', [
            'today' => $today, 
            'ranking' => $ranking,
            'recents' => $recents
        ]);
    }

    public function profile($username)
    {
        $user = User::where('username', $usersname)->first();

        return view('front-end.profile', ['user' => $user]);
    }

    public function profileOfUser($id)
    {
        return view('front-end.profile-of-user');
    }

    public function RankingEmpleados()
    {
        return view('front-end.ranking-empleados');
    }

    public function ChatEmpleados()
    {

        return view('front-end.chatUsers');
    }

    public function Calendar()
    {
        return view('front-end.calendario');
    }

    public function SolicitudPermiso()
    {
        return view('front-end.solicitud-permiso');
    }

    public function SolicitudPermisoEmergencia()
    {
        return view('front-end.motivo-emergencia');
    }

    public function BuzonSugerencias()
    {
        return view('front-end.buzon-sugerencias');
    }

    public function DetallsSolicitudesInProceso()
    {
        return view('front-end.solicitud-proceso');
    }

    public function EvaluationToPersonal()
    {
        return view('front-end.evaluaciones-a-personal');
    }

    public function EvaluationToPersonalDetall()
    {
        return view('front-end.evaluaciones-a-personal-detall');
    }

    public function EvaluationToPersonalEvaluados()
    {
        return view('front-end.evaluaciones-a-personal-evaluados');
    }




    public function logOut(Request $request){

        Auth::logout();
        return redirect('/login');
    }


}
