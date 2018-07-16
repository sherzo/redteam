<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request as facedesrequest;
use Auth;
use Carbon\Carbon;
use App\Application;
use App\Emergency;
use App\Publication;
use App\Notification;
use App\Event;
use App\Message;

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

        $emergencies = Emergency::whereDate('created_at', $today)->count();
        $applications = Application::whereDate('created_at', $today)->count();
        

        $lates = 0;

        //$chats = $user->chats()->
        /*
        $messages = Message::where('messages.user_id', '!=', $user->id)
            ->join('chats', 'chats.transmitter_id', '=', 'messages.user_id')
            ->join('chats', 'chats.receiver_id', '=', 'messages.user_id')
            ->where(function ($query) use ($user) {
                $query->where('chats.receiver_id', $user->id)
                ->orWhere('chats.transmitter_id', $user->id);
            })
            ->where('messages.seen', false)
            ->orderBy('messages.created_at', 'desc')
            ->take(5)
            ->get();
        */

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

        //return $chats;
        /*
        $chats = $user->chats()->with(['messages' => function($query) use ($user) {
            $query->where('seen', false)
            ->where('user_id', '!=', $user->id)
            ->orderby('created_at', 'DESC')
            ->with('user')
            ->take(1);
        }])->get();
    */

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

        switch ($element) {
            case 'notifications':
                $countYesterday = Publication::whereDate('created_at', $yesterday)->count();
                $countYesterday += Event::whereDate('created_at', $yesterday)->count();
                break;
            
            case 'lates':
                $countYesterday = 0;
                break;
            
            case 'emergencies':
                $countYesterday = Emergency::whereDate('created_at', $yesterday)->count();
                break;
        
            default:
                $countYesterday = Application::whereDate('created_at', $yesterday)->count();
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