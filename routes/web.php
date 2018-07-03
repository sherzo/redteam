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
    
    // Cronjob birthdays
    Route::get('birthday', 'NotificationController@birthday');
/*
|--------------------------------------------------------------------------
| Groups routes for Admin
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' =>  'auth', 'prefix' => 'admin'], function() {

    Route::get('home', 'Admin\AdminController@Home');
    Route::get('homedefault', function(){
        return view('back-end.homedefault');
    });
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
    Route::get('chats', 'ChatController@index');
    Route::get('calendar', 'CalendarController@index');
    /*
    *   Home admin
    */
    Route::get('dashboard', 'Admin\AdminController@dashboard');
    Route::get('yesterday/{data}', 'Admin\AdminController@getYesterday');
    Route::post('messages/mark-as-read', 'Admin\AdminController@markAsRead');
    Route::get('reminders', 'ReminderController@all');
    Route::post('reminders/store', 'ReminderController@store');
    Route::post('reminders/mark-as-completed', 'ReminderController@markAsCompleted');
    /*
    *   Admin Notifications
    */
    Route::get('admin-notification', 'AdminNotificationController@all');
    Route::post('admin-notification/store', 'AdminNotificationController@store');
    Route::post('admin-notification/send', 'AdminNotificationController@send');
    /*
    *   Assistances history
    */ 
    Route::get('assistances', 'AssistanceController@index');
    Route::get('assistances/all', 'AssistanceController@all');
    Route::post('assistances/adp', 'AssistanceController@adp');
    Route::get('assistances/{id}/individual', 'AssistanceController@individual');
    Route::get('assistances/all-users', 'AssistanceController@allUsers');
    
});

Route::group(['middleware' =>  'auth'], function() {
    /*
    *   Publicaciones
    */
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
    /*
    *   Evaluaciones
    */
    Route::get('evaluations', 'EvaluationController@index');
    Route::get('evaluations/employees', 'EvaluationController@employees');
    Route::post('evaluations/store', 'EvaluationController@store');
    /*
    *   Ranking
    */
    Route::get('ranking', 'RankingController@ranking');
    Route::get('ranking/employees', 'RankingController@employees');
    /*
    *   Chats
    */
    Route::get('chats', 'ChatController@chat');
    Route::get('chats/all', 'ChatController@all');
    Route::get('chats/users', 'ChatController@users');
    Route::get('chats/{id}/get-messages', 'ChatController@getMessages');
    Route::get('chats/{id}/get-or-create', 'ChatController@getOrCreate');
    Route::post('chats/delete', 'ChatController@delete');
    Route::post('chats/send-file', 'ChatController@sendFile');
    
    /*
    *   Calendario
    */
    Route::get('calendar', 'CalendarController@calendar');
    Route::get('calendar/{date}/render', 'CalendarController@renderMonth');
    Route::get('calendar/{date}/events', 'CalendarController@events');
    Route::get('calendar/today-event', 'CalendarController@todayEvent');
    Route::post('calendar/store', 'CalendarController@store');
    
    /*
    *   Assistence
    */
    Route::post('mark-entry', 'AssistanceController@markEntry');
    Route::post('mark-exit', 'AssistanceController@markExit');
    Route::get('get-work-status', 'AssistanceController@getWorkStatus');
    
    /*
    *   Notifications
    */
    Route::get('notifications', 'NotificationController@all');

    /*
    *   Profile
    */
    Route::get('/profile/{username}', 'ProfileController@index');
    Route::get('profile/{id}/my-publications', 'ProfileController@myPublications');
    Route::post('profile', 'ProfileController@update')->name('profile.update');
    Route::get('galeries/{id}', 'ProfileController@galeries');
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

    