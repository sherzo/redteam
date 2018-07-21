<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersonalInformation;
use App\AcademicInformation;
use App\WorkInformation;
use App\ScheduleDay;
use App\Performance;
use App\Assistance;
use Carbon\Carbon;
use App\Schedule;
use App\Branch;
use App\Event;
use App\User;
use App\Area;
use App\Mark;
use App\Role;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('score', 'desc')->get();

        return view('back-end.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $users = User::where('name', 'like', '%' . $request->q . '%')->orWhere('second_name', 'like', '%' . $request->q . '%')
        ->orWhere('lastname', 'like', '%' . $request->q  . '%')->orderBy('score', 'desc')->get();


        return view('back-end.users.index', [
            'users' => $users,
            'q' => $request->q
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::pluck('name', 'id');
        $marks = Mark::pluck('name', 'id');
        $branches = Branch::pluck('name', 'id');
        $bosses = User::where('id', '!=', Auth::user()->id)->get();
        $roles = Role::pluck('display_name', 'id');

        return view('back-end.users.create', [
            'branches' => $branches,
            'marks' => $marks,
            'areas' => $areas,
            'bosses' => $bosses,
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        *   Se genera el username único
        */
        $username = $this->generateUsername($request->all());

        $avatar = $request->file('avatar');

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'second_name' => $request->second_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'username' => $username,
            'gender' => $request->gender,
            'avatar' => $avatar->store('avatars', 'public'),
            'user_id' => $request->boss_id
        ]);

        /*
        *   Se asigna el rol del usuario
        */
        $user->attachRole($request->role_id);

        $data = $request->all();
        $data['user_id'] = $user->id;

        /*
        *   Se registra información extra del usuario
        */
        $personal = PersonalInformation::create($data);
        $academic = AcademicInformation::create($data);
        $academic = WorkInformation::create($data);

        /*
        *   Horarios tiempo completo
        */
        if($request->get_horariosc1_time) {
            $this->createSchedule(
                $user->id,
                $request->get_horariosc1, 
                $request->get_horariosc1_time
            );
        }

        if($request->get_horariosc2_time) {
            $this->createSchedule(
                $user->id,
                $request->get_horariosc2, 
                $request->get_horariosc2_time
            );
        }

        if($request->get_horariosc3_time) {
            $this->createSchedule(
                $user->id,
                $request->get_horariosc3, 
                $request->get_horariosc3_time
            );
        }


        /*
        *   Horaios medio día
        */
        $midday = true;

        if($request->get_horariosm1_time) {
            $this->createSchedule(
                $user->id,
                $request->get_horariosm1, 
                $request->get_horariosm1_time,
                $midday
            );
        }

        if($request->get_horariosm2_time) {
            $this->createSchedule(
                $user->id,
                $request->get_horariosm2, 
                $request->get_horariosm2_time,
                $midday
            );
        }

        if($request->get_horariosm3_time) {
            $this->createSchedule(
                $user->id,
                $request->get_horariosm3, 
                $request->get_horariosm3_time,
                $midday
            );
        }

        flash()->success('Se registro el usuario correctamente');

        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $user_id
     * @param  string $days
     * @param  string $times
     * @param  boolean $midday default false   
     * 
     */
    public function createSchedule($user_id, $days, $times, $midday = false)
    {
        list($entry, $exit) = explode(',', $times);
            
        $schedule = Schedule::create([
            'user_id' => $user_id,
            'entry' => $entry,
            'exit' => $exit,
            'midday' => $midday
        ]);
        
        $days = explode(',', $days);
        
        foreach ($days as $day) {
            $schedule->days()->create([
                'day' => $day
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $users = User::all();
        $areas = Area::pluck('name', 'id');
        $days = ['d', 'l', 'm', 'm', 'j', 'v', 's'];
        $daysShow = ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
        $completes = $user->schedulesComplete;
        $midday = $user->schedulesMidday;

        return view('back-end.users.edit', [
            'user' => $user,
            'users' => $users,
            'areas' => $areas,
            'days' => $days,
            'completes' => $completes,
            'daysShow' => $daysShow,
            'midday' => $midday
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $user = User::find($id);

        if($request->avatar) {
            $avatar = $request->file('avatar');
            $user->avatar = $avatar->store('avatars', 'public');
            $user->save();
        }

        $user->boss_id = $request->boss_id;
        $user->save();
        /*
        *   Update personal information
        */        
        $personal = $user->personal;
        $personal->personal_email = $request->personal_email;
        $personal->address = $request->address;
        $personal->birthdate = $request->birthdate;
        $personal->marital = $request->marital;
        $personal->save();
        
        /*
        *   Update work information
        */
        $work = $user->work;
        $work->area_id = $request->area_id;
        $work->phone = $request->phone;
        $work->extension = $request->extension;
        $work->save();
        
        flash()->success('Se actualizó el usuario correctamente');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        
        $user->delete();

        flash()->success('Se elimino el usuario correctamente');
        
        return redirect()->back();
    }

    /**
     * Edit schedule the users.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function schedule(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $completes = $user->schedulesComplete;
        $midday = $user->schedulesMidday;

        $users = User::all();
    
        return view('back-end.users.schedule', [
            'users' => $users,
            'user' => $user,
            'completes' => $completes,
            'midday' => $midday
        ]);
    }

    public function getSchedules($id)
    {
        $user = User::findOrFail($id);
        $completes = $user->schedulesComplete;
        $midday = $user->schedulesMidday;

        $completes->load('days');
        $midday->load('days');
        
            return [
                'completes' => $completes,
                'midday' => $midday
            ];
    }

    public function profile($username) // Profle Admin
    {
        $user = User::where('username', $username)->first();
        
        $assistances = Assistance::where('user_id', $user->id)
            ->take(50)
            ->orderBy('id', 'DESC')
            ->get();

        $performances = Performance::where('user_id', $user->id)
            ->take(50)
            ->orderBy('id', 'DESC')
            ->get();
        
        return view('back-end.users.profile', [
            'user' => $user,
            'assistances' => $assistances,
            'performances' => $performances
        ]);
    }


    /**
     * Update schedule for users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateSchedule(Request $request)
    {
        $user = User::findOrFail($id);

        $users = User::all();

        return view('back-end.users.schedule', [
            'users' => $users,
            'user' => $user
        ]);
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  array $data
     * @return string $username
     */
    private function generateUsername($data) 
    {
        $now = Carbon::now();

        $username = $data['name'] . $data['lastname'] . $now->format('ms');

        $username = $this->removeAccents($username);

        $exists = User::where('username', $username)->exists();

        if($exists) {
            $this->generateUsername($data);
        } 

        return $username;
    }

    /**
     * Remove accents string
     *
     * @param  string $text
     * @return string $text
     */
    private function removeAccents($text)
    {
        $text = htmlentities($text, ENT_QUOTES, 'UTF-8');
        $text = strtolower($text);
        $patron = array (
            // Espacios, puntos y comas por guion
            //'/[\., ]+/' => ' ',
 
            // Vocales
            '/\+/' => '',
            '/&agrave;/' => 'a',
            '/&egrave;/' => 'e',
            '/&igrave;/' => 'i',
            '/&ograve;/' => 'o',
            '/&ugrave;/' => 'u',
 
            '/&aacute;/' => 'a',
            '/&eacute;/' => 'e',
            '/&iacute;/' => 'i',
            '/&oacute;/' => 'o',
            '/&uacute;/' => 'u',
 
            '/&acirc;/' => 'a',
            '/&ecirc;/' => 'e',
            '/&icirc;/' => 'i',
            '/&ocirc;/' => 'o',
            '/&ucirc;/' => 'u',
 
            '/&atilde;/' => 'a',
            '/&etilde;/' => 'e',
            '/&itilde;/' => 'i',
            '/&otilde;/' => 'o',
            '/&utilde;/' => 'u',
 
            '/&auml;/' => 'a',
            '/&euml;/' => 'e',
            '/&iuml;/' => 'i',
            '/&ouml;/' => 'o',
            '/&uuml;/' => 'u',
 
            '/&auml;/' => 'a',
            '/&euml;/' => 'e',
            '/&iuml;/' => 'i',
            '/&ouml;/' => 'o',
            '/&uuml;/' => 'u',
 
            // Otras letras y caracteres especiales
            '/&aring;/' => 'a',
            '/&ntilde;/' => 'n',
 
            // Agregar aqui mas caracteres si es necesario
 
        );
 
        $text = preg_replace(array_keys($patron),array_values($patron),$text);
        return $text;
    }

    public function employeesTaks()
    {
        $boss = Auth::user();

        $employees = $boss->employees;

        $employees->each(function($employee) {

            $today = now()->format('Y-m-d');
            $tasks = $employees->tasks()->whereDate('created_at', $today)->get();
            if($tasks->count() == 10) {
                
            }

        });

        return $employees;
    }
}
