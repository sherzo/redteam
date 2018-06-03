<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Area;
use App\Branch;
use App\Mark;
use App\Role;
use App\PersonalInformation;
use App\AcademicInformation;
use App\WorkInformation;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('back-end.users.index', [
            'users' => $users
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
        $bosses = User::pluck('name', 'id');
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

        $username = $this->generateUsername($request->all(), 1);
        /*
        $username = $request->name . $request->lastname . $now->format('ymd');


        $username = strtolower($username);

        $username = $this->removeAccents($username); */
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
        ]);

        $user->attachRole($request->role_id);

        $data = $request->all();
        $data['user_id'] = $user->id;

        $personal = PersonalInformation::create($data);
        $academic = AcademicInformation::create($data);
        $academic = WorkInformation::create($data);

        return redirect('admin/users')->withSuccess('Se registro el empleado correctamente');
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
        //dd($user);
        return view('back-end.users.edit', [
            'user' => $user,
            'users' => $users,
            'areas' => $areas
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
        //
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
    }

    private function generateUsername($data, $num) 
    {
        $now = Carbon::now();

        $username = $data['name'] . $data['lastname'] . $now->format('ms');

        $username = $this->removeAccents($username);

        $exists = User::where('username', $username)->exists();

        if($exists) {
            $this->generateUsername($data, $num);
        } 

        return $username;
    }

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

}
