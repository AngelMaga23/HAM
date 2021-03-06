<?php

use App\Http\Controllers\EstatuController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('catalogos/Default');
});

Route::get('defaul', function () {
    return view('catalogos/Default');
})->name('defaul');

Route::get('user',function(){
    return view('catalogos/User');
})->name('user');

Route::get('empresa', function(){
    return view('catalogos/Empresa');
})->name('empresa');


Route::get('qr', function(){
    return view('catalogos/Qr');
})->name('qr');

Route::get('habitaciones', function(){
    return view('catalogos/Habitaciones');
})->name('habitaciones');

Route::get('ReservaHabitacion', function(){
    return view('catalogos/ReservaHabitacion');
})->name('reservahabitacion');



Route::get('Servicios', function(){
    return view('catalogos/Servicios');
})->name('servicios');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Rutas zonas
//Vista
  Route::get('Zonas', function(){
    return view('catalogos/Zonas');
  })->name('zonas');
//Crud
    //get
Route::get('web/zonas','ZonaController@Listar');
    //post
Route::post('web/zonas/save','ZonaController@Agregar');
Route::post('web/save','ZonaController@saveimg');

//Rutas Areas
Route::get('areas', function(){
    return view('catalogos/Areas');
})->name('areas');

Route::get('web/areas','AreaController@Listar');
Route::get('web/areas/{id}','AreaController@Buscar');

Route::post('web/areas/save','AreaController@Save');
Route::post('web/areas/delete','AreaController@Delete');
//Rutas Estatus
//vista
Route::get('Estatus', function(){
    return view('catalogos/Estatus');
})->name('estatus');
//Crud
//get
Route::get('web/estatus','EstatuController@Listar');
Route::get('web/estatus/{id}','EstatuController@Buscar');
//post
Route::post('web/estatus/save','EstatuController@Agregar');
Route::post('web/estatus/delete','EstatuController@Eliminar');
Route::post('web/estatus/update','EstatuController@Actualizar');

//Rutas notifservi
//vistas
Route::get('notificaciones', function(){
    return view('catalogos/Notificaciones');
})->name('notificaciones');

Route::get('web/notificaciones','NotificacionController@Listar');
Route::get('web/notifcac/{id}','EstatuController@Buscar');
Route::get('web/notifservi/{id}','NotificacionController@Buscar');
Route::get('web/notip','NotificacionController@Listartipn');
Route::get('web/useractive','NotificacionController@ListarUser');

Route::post('web/notifservi/save','NotificacionController@SaveServ');

Route::post('web/notifrecord/save','NotificacionController@SaveRecor');













