<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as facedesrequest;
use App\Notification;
use App\Publication;
use App\Application;
use App\Emergency;
use Carbon\Carbon;
use App\Message;
use App\Event;
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
            ->get();

        $notifications = $this->addClass($notifications);

        $today = Event::whereDate('day', now()->format('Y-m-d'))->orderBy('id', 'desc')->first();

        return view('back-end.home', ['today' => $today, 'notifications' => $notifications]);      
    }

    public function markReadNotifications()
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
            ->get();

        $notifications->each(function($notification) use ($user){
            $user->notifications()->attach($notification->id);
        });

    }

    public function dashboard()
    {
        $user = Auth::user();

        $today = now()->format('Y-m-d');
        $notifications = Notification::where('user_id', $user->id)
            ->whereDate('created_at', $today)
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
            ->count();

        $emergencies = Notification::where('user_id', $user->id)
            ->whereDate('created_at', $today)
            ->where('type', 11)
            ->whereDoesntHave('users', function ($q) use ($user) { 
                $q->where('user_id', $user->id);
            })
            ->count();

        $applications = Notification::where('user_id', $user->id)
            ->whereDate('created_at', $today)
            ->where('type', 12)
            ->whereDoesntHave('users', function ($q) use ($user) { 
                $q->where('user_id', $user->id);
            })
            ->count();       

        $lates = 0;

        $messages = collect();
       
        $chats = $user->chats()->take(5)->get();

        $chats->each(function($chat) use ($user, $messages) {
            
            $message =  $chat->messages()
                ->with('user')
                ->where('seen', false)
                ->where('user_id', '!=', $user->id)
                ->where('type', 0)
                ->orderby('id', 'desc')
                ->first();
            if(!is_null($message)) {
                $messages->push($message);
            }
        });

        return [
            'notifications' => $notifications,
            'applications' => $applications,
            'emergencies' => $emergencies,
            'lates' => $lates,
            'messages' => $messages 
        ];
    }

     /**
     * Mark 
     *
     * @return \Illuminate\Http\Response
     */
    public function MarkAsRead(Request $request)
    {
        $applications = Message::whereIn('id', $request->ids)
            ->update(['seen' => true]);
        
        return [
            'result' => true
        ]; 
    }


    public function getYesterday($element) 
    {
        $yesterday = Carbon::yesterday()->format('Y-m-d');
        $user = Auth::user();

        switch ($element) {
            case 'notifications':
                $countYesterday = Notification::where('user_id', $user->id)
                ->whereDate('created_at', $yesterday)
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
                break;
            
            case 'lates':
                $countYesterday = 0;
                break;
            
            case 'emergencies':
                $countYesterday = Notification::where('user_id', $user->id)
                ->whereDate('created_at', $yesterday)
                ->where('type', 11)
                ->whereDoesntHave('users', function ($q) use ($user) { 
                    $q->where('user_id', $user->id);
                })
                ->count();
                break;
            default:
                $countYesterday = Notification::where('user_id', $user->id)
                ->whereDate('created_at', $yesterday)
                ->where('type', 12)
                ->whereDoesntHave('users', function ($q) use ($user) { 
                    $q->where('user_id', $user->id);
                })
                ->count(); 
                break;
 
        }
        
        return $countYesterday;
    }

    private function addClass($notifications) 
    {
         $notifications->each(function($recent) {
            $recent->class = 'NewFotos';
            
            if($recent->type == 0) {
                
                $recent->class = 'PublicatiOn';
                $recent->icon = 'icoPubli';

            }else if($recent->type == 1){
                
                $recent->class = 'ActivitiPago';
                $recent->icon = 'icoPagos';

            
            } else if($recent->type == 2){
                
                $recent->class = 'Profilesa';
                $recent->icon = 'icoProFile';
            
            } else if($recent->type == 3){
                
                $recent->icon = 'icoFotos';
            
            } else if($recent->type == 4){
                
                $recent->icon = 'icoCumple';
            
            } else if($recent->type == 5){
                
                $recent->icon = 'icoLikes';
            
            } else if($recent->type == 6){
                
                $recent->icon = 'icoComentarios';

            } else if($recent->type == 7) {

                $recent->icon = 'icoUrgente'; 

            } else if($recent->type == 8) {

                $recent->icon = 'icoProFile'; 

            } else {

                $recent->icon = 'icoCalendar'; 
            
            }
        });

        return $notifications;
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