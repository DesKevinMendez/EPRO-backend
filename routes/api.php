<?php

use Illuminate\Http\Request;

Route::get('email', function(){
    return new App\Mail\accessToParking(\App\Invitados::first());
});
Route::group([
    'prefix' => 'auth',
    'namespace' => 'jwt',
    'middleware' => ['api', 'cors']
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout')->name('logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('register', 'AuthController@register');
});

Route::group([
    'middleware' => ['api', 'cors', 'jwt']
], function () {
    //Qr
    Route::get('qr', 'QRController@index');
    Route::get('home', 'HomeController@index');
    //Aranceles
    Route::get('aranceles', 'ArancelesController@index');
    Route::get('historialAranceles', 'ArancelesController@aranceles');
    //Parqueo
    Route::get('historialParqueo', 'ParqueoController@index');
    Route::get('historialIngresoParqueo', 'ParqueoController@IngresoParqueo');
    Route::POST('cambiarpassword', 'EstudiantesController@ChangePass');
    Route::middleware('role:Admin')->get('allStudents', 'EstudiantesController@estudiante');
    Route::middleware('role:Admin')->get('maestros', 'EstudiantesController@maestros');
    Route::middleware('role:Admin')->get('admin', 'EstudiantesController@administradores');
    Route::middleware('role:Admin')->get('usuario/{url}', 'EstudiantesController@getUser');
    Route::middleware('role:Admin')->post('nuevoInvitado', 'InvitadosController@create');
    Route::middleware('role:Admin')->get('invitados', 'InvitadosController@index');
    Route::middleware('role:Admin')->get('reporteInvitados', 'InvitadosController@reporte');
    //historial
});


Route::group([
    'middleware' => ['api', 'cors']
], function () {
    Route::POST('nuevoingresoparqueo', 'IngresoParqueoController@create');
});
