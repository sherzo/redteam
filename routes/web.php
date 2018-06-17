<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/hom', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| llamar routas de login y registro
|--------------------------------------------------------------------------
|
*/
    Route::get('/registers', function () {
        return view('welcome');
    });

    Route::get('/', function () {
        return view('auth.login');
    });
    
    Auth::routes();

/*
|--------------------------------------------------------------------------
| Groups routes for Admin
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' =>  'auth', 'prefix' => 'admin'], function() {

    Route::get('home', 'Admin\AdminController@Home');
    /*
    |--------------------------------------------------------------------------
    | Routes resources (index, create, edit and delete) 
    |--------------------------------------------------------------------------
    |
    */
    Route::get('documents/all', 'DocumentController@all');
    Route::post('documents/add-folder', 'DocumentController@addFolder');
    Route::get('documents/{id}/subdocuments', 'DocumentController@getSubdocuments');
    Route::get('ranking/all', 'RankingController@all');
    Route::post('ranking/add', 'RankingController@addADP');
    Route::resources([
        'users' => 'UserController',
        'documents' => 'DocumentController',
        'ranking' => 'RankingController'
    ]);
    Route::get('all/suggestions', 'SuggestionController@all');
    Route::get('suggestions', 'SuggestionController@index');
    Route::get('all/emergencies', 'EmergencyController@all');
    Route::get('emergencies', 'EmergencyController@index');
    Route::get('all/applications', 'ApplicationController@all');
    Route::get('applications', 'ApplicationController@index');
    
    Route::get('users/{id}/schedules', 'UserController@schedule')->name('users.schedule');
    Route::get('users/{id}/get-schedules', 'UserController@getSchedules');
    Route::post('users/schedules', 'UserController@updateSchedules')->name('update.schedule');
});

Route::group(['middleware' =>  'auth'], function() {
    Route::get('publications', 'PublicationController@index');
    Route::post('publications', 'PublicationController@store');
    Route::post('publications/like', 'PublicationController@like');
    Route::post('publications/comment', 'PublicationController@comment');
    
    Route::post('suggestions/discussion', 'SuggestionController@discussion');
    Route::post('suggestions/mark-as-read', 'SuggestionController@markAsRead');
    Route::post('emergencies/discussion', 'EmergencyController@discussion');
    Route::post('emergencies/mark-as-read', 'EmergencyController@markAsRead');
    Route::post('applications/mark-as-read', 'ApplicationController@markAsRead');
    Route::post('applications/discussion', 'ApplicationController@discussion');
    Route::post('applications/acept-or-denied', 'ApplicationController@aceptOrDenied');
    Route::resources([
        'suggestions' => 'SuggestionController',
        'emergencies' => 'EmergencyController',
        'applications' => 'ApplicationController'
    ]);
    Route::get('buzon', 'SuggestionController@buzon');
    Route::get('emergency', 'EmergencyController@emergency');
    Route::get('application', 'ApplicationController@application');
    Route::get('requests-process', 'ProfileController@process');
    Route::get('get-applications', 'ProfileController@applications');
    Route::get('get-suggestions', 'ProfileController@suggestions');
    Route::get('get-emergencies', 'ProfileController@emergencies');
    Route::get('evaluations', 'EvaluationController@index');
    Route::get('evaluations/employees', 'EvaluationController@employees');
    Route::post('evaluations/store', 'EvaluationController@store');
    Route::get('ranking', 'RankingController@ranking');
    Route::get('ranking/employees', 'RankingController@employees');
    Route::get('chats', 'ChatController@index');
    Route::get('chats/all', 'ChatController@all');
    Route::get('chats/{id}/get-messages', 'ChatController@getMessages');
    Route::get('chats/{id}/get-or-create', 'ChatController@getOrCreate');
});

/*
|--------------------------------------------------------------------------
| Home Users
|--------------------------------------------------------------------------
|
*/
Route::get('/home', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Profile Users
|--------------------------------------------------------------------------
|
*/
Route::get('/profile/{username}', 'ProfileController@index');

/*
|--------------------------------------------------------------------------
| Profile Users update
|--------------------------------------------------------------------------
|
*/
Route::post('profile', 'ProfileController@update')->name('profile.update');

/*
|--------------------------------------------------------------------------
| Profile Del usuario
|--------------------------------------------------------------------------
|
*/
Route::get('/profile-users/{id}', 'HomeController@profileOfUser');

/*
|--------------------------------------------------------------------------
| Ranking de Empleados
|--------------------------------------------------------------------------
|
*/
// PENDIENTE
Route::get('/ranking-empleados', 'HomeController@RankingEmpleados');


/*
|--------------------------------------------------------------------------
| Chat entre Empleados
|--------------------------------------------------------------------------
|
*/
Route::get('/chatUsers', 'HomeController@ChatEmpleados');

/*
|--------------------------------------------------------------------------
| Calendario
|--------------------------------------------------------------------------
|
*/
Route::get('/calendario', 'HomeController@Calendar');

/*
|--------------------------------------------------------------------------
| Solicitud de permiso
|--------------------------------------------------------------------------
|
*/
Route::get('/solicitud-permiso', 'HomeController@SolicitudPermiso');

/*
|--------------------------------------------------------------------------
| Permiso Emergencia
|--------------------------------------------------------------------------
|
*/
Route::get('/emergencia', 'HomeController@SolicitudPermisoEmergencia');

/*
|--------------------------------------------------------------------------
| Buzon Sugerencias
|--------------------------------------------------------------------------
|
*/
Route::get('/buzon-sugerencias', 'HomeController@BuzonSugerencias');


/*
|--------------------------------------------------------------------------
| Detalles de solicitudes enviadas
|--------------------------------------------------------------------------
|
*/
Route::get('/solicitudes-proceso', 'HomeController@DetallsSolicitudesInProceso');

/*
|--------------------------------------------------------------------------
| Evaluacion a personal
|--------------------------------------------------------------------------
|
*/
Route::get('/evaluacion-a-personal', 'HomeController@EvaluationToPersonal');


/*
|--------------------------------------------------------------------------
| Evaluacion a personal detall
|--------------------------------------------------------------------------
|
*/
Route::get('/evaluacion-a-personal/1/1', 'HomeController@EvaluationToPersonalDetall');

/*
|--------------------------------------------------------------------------
| Evaluacion a personal evaluados
|--------------------------------------------------------------------------
|
*/
Route::get('/evaluacion-a-personal-evaluados', 'HomeController@EvaluationToPersonalEvaluados');


/*
|--------------------------------------------------------------------------
| Route Logout
|--------------------------------------------------------------------------
|
*/
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');




/*
|--------------------------------------------------------------------------
| ADMMINISTRADOR GENERAL
|--------------------------------------------------------------------------
| Si el usuario no es Admin no puede accesder a las siguiente rutas
|
*/

    Route::get('/admin/home', 'Admin\AdminController@Home');


    /*
    |--------------------------------------------------------------------------
    | Route Board admin
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/admin/board', 'Admin\AdminController@Board');

    /*
    |--------------------------------------------------------------------------
    | Route chat admin
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/admin/chat', 'Admin\AdminController@ChatAdmin');


    /*
    |--------------------------------------------------------------------------
    | Route Sugerencias admin
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/admin/sugerencias', 'Admin\AdminController@Sugerencias');


    /*
    |--------------------------------------------------------------------------
    | Route EMergencias admin
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/admin/emergencias', 'Admin\AdminController@Emergencias');

    /*
    |--------------------------------------------------------------------------
    | Route solicitud permisos admin
    |--------------------------------------------------------------------------
    |
    */


    Route::get('/admin/solicitud-permisos', 'Admin\AdminController@SolicitudPermisos');

        /*
        |--------------------------------------------------------------------------
        | Busqueda se solicitudes del usuario
        |--------------------------------------------------------------------------
        |
        */
        Route::get('/admin/search_solicitudes', 'Admin\AdminController@SearchSolicitudPermiso');
        Route::post('/admin/search_solicitudes', 'Admin\AdminController@SearchSolicitudPermiso');

        /*
        |--------------------------------------------------------------------------
        | Busqueda se solicitudes de emergencias del usuario
        |--------------------------------------------------------------------------
        |
        */

        Route::get('/admin/search_solicitudes_emergencias', 'Admin\AdminController@SearchEmergencias');
        Route::post('/admin/search_solicitudes_emergencias', 'Admin\AdminController@SearchEmergencias');

        /*
        |--------------------------------------------------------------------------
        | Busqueda se solicitudes de sugerencias del usuario
        |--------------------------------------------------------------------------
        |
        */
        Route::get('/admin/search_solicitudes_suegerencias', 'Admin\AdminController@SearchSugerencias');
        Route::post('/admin/search_solicitudes_suegerencias', 'Admin\AdminController@SearchSugerencias');


    /*
    |--------------------------------------------------------------------------
    | Ruta calendario
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/admin/calendario', 'Admin\AdminController@Calendar');

    /*
    |--------------------------------------------------------------------------
    | Ruta documentos
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/admin/documentos', 'Admin\AdminController@Documentos');


    /*
   |--------------------------------------------------------------------------
   | Ruta Ranking
   |--------------------------------------------------------------------------
   |
   */
    // Route::get('/admin/ranking', 'Admin\AdminController@Ranking');


    /*
    |--------------------------------------------------------------------------
    | Ruta historial de llegada admin
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/admin/history', 'Admin\AdminController@HistoryUsers');

    /*
    |--------------------------------------------------------------------------
    | Ruta historial de llegada por usuario admin
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/admin/history/{id}', 'Admin\AdminController@HistoryEntradaSalidaUsers');

    /*
    |--------------------------------------------------------------------------
    | Ruta historial de llegadas de todos los usuarios admin
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/admin/historys/data/allUsers', 'Admin\AdminController@HistoryEntradaSalidaUsersAlls');

    /*
   |--------------------------------------------------------------------------
   | Historial de llegadas Fechas
   |--------------------------------------------------------------------------
   |
   */
    Route::get('/admin/HistoryLlegadas/histo/Asist/{fecha}', 'Admin\AdminController@HistoryUsersFechas');

    /*
    |--------------------------------------------------------------------------
    | Agregar usuario
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/admin/addUsers', 'Admin\AdminController@AddUsers');

    /*
    |--------------------------------------------------------------------------
    | All usuario
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/admin/usuarios', 'Admin\AdminController@UsersAll');

    /*
    |--------------------------------------------------------------------------
    | Editar usuario
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/admin/usuarios/edit/{id}', 'Admin\AdminController@EditUser');


    /*
    |--------------------------------------------------------------------------
    | Editar Horario
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/admin/usuarios/editHorario/{id}', 'Admin\AdminController@EditUserHorario');

    /*
    |--------------------------------------------------------------------------
    | Editando por grupos
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/admin/usuarios/grupos/edit', 'Admin\AdminController@EditUserGrupos');

    