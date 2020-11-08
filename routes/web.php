<?php

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
Route::get('Zonas', function(){
    return view('catalogos/Zonas');
})->name('zonas');
Route::get('Servicios', function(){
    return view('catalogos/Servicios');
})->name('servicios');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
