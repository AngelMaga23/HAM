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
    return view('prueba');
});

Route::get('empresa', function(){
    return view('catalogos/Empresa');
})->name('empresa');

Route::get('areas', function(){
    return view('catalogos/Areas');
})->name('areas');
Route::get('Empleados', function(){
    return view('catalogos/Empleados');
})->name('empleados');

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
Route::get('api/zonas','ZonaController@Listar');
    //post
Route::post('api/zonas/save','ZonaController@Agregar');
Route::post('api/save','ZonaController@saveimg');

//Rutas Areas


//Rutas Estatus
//vista
Route::get('Estatus', function(){
    return view('catalogos/Estatus');
})->name('estatus');
//Crud
//get
Route::get('api/estatus','EstatuController@Listar');
Route::get('api/estatus/{id}','EstatuController@Buscar');
//post
Route::post('api/estatus/save','EstatuController@Agregar');
Route::post('api/estatus/delete','EstatuController@Eliminar');
Route::post('api/estatus/update','EstatuController@Actualizar');

//Rutas notifservi
//vistas
Route::get('notifservi', function(){
    return view('catalogos/NotifServi');
})->name('notifservi');

Route::get('api/notifservi','NotificacionController@ListarServ');
Route::get('api/notifservi/{id}','NotificacionController@BuscarServ');
Route::get('api/notip','NotificacionController@Listartipn');

Route::post('api/notifservi/save','NotificacionController@SaveServ');















