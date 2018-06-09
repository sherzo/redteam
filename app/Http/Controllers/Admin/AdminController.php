<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as facedesrequest;
use Auth;


class AdminController extends Controller
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


    public function Home()
    {
        $user = Auth::user();
        if($user->hasRole('admin')) {

            return view('back-end.home');
        
        } else {
            return view('back-end.home');
        }   
    }

    public function Board()
    {
        return view('back-end.board');
    }

    public function ChatAdmin()
    {
        return view('back-end.chatAdmin');
    }

    public function Sugerencias()
    {
        return view('back-end.sugerencias');
    }


    public function Emergencias()
    {
        return view('back-end.emergencias');
    }

    public function SolicitudPermisos()
    {
        return view('back-end.solicitud-permisos');
    }

    public function SearchSolicitudPermiso()
    {
        return view('back-end.solicitud-permisos');
    }

    public function Calendar()
    {
        return view('back-end.calendario');
    }

    public function Documentos()
    {
        return view('back-end.documentos');
    }

    public function Ranking()
    {
        return view('back-end.ranking');
    }

    public function HistoryUsers()
    {
        return view('back-end.historial-usuarios');
    }

    public function HistoryEntradaSalidaUsers($id)
    {
        return view('back-end.historial-entrada-salida');
    }

    public function HistoryEntradaSalidaUsersAlls()
    {
        return view('back-end.historial-entrada-salida-all');
    }

    public function HistoryUsersFechas($fecha)
    {
        return view('back-end.historial-usuarios');
    }

    public function AddUsers()
    {
        return view('back-end.Add-usuarios');
    }

    public function UsersAll()
    {
        return view('back-end.usuarios');
    }

    public function EditUser($id)
    {
        return view('back-end.Edit-usuarios');
    }

    public function EditUserHorario($id)
    {
        return view('back-end.Edit-usuarios-horario');
    }

    public function EditUserGrupos(Request $request)
    {
        return view('back-end.Edit-usuarios-grupos');
    }






}