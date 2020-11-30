<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

 
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', 'Api\AuthApiController@login');
Route::post('signup', 'Api\AuthApiController@signUp');
Route::post('save_token', 'Api\AuthApiController@Save_token');

Route::get('areas','Api\AreaController@index');
Route::get('area/{idzona}/show','Api\AreaController@get_area');

Route::get('zonas','Api\ZonaController@index');

Route::get('habitaciones','Api\HabitacionController@index');

Route::get('servicios','Api\ServicioController@index');

Route::post('reser_register','Api\ReservacionController@store');
Route::post('show_register/{id}','Api\ReservacionController@show');

Route::post('reser_ocupado','Api\ReservacionController@update_ocupado');
Route::post('reser_finzalizado','Api\ReservacionController@update_finalizado');
// Route::post('save_area','AreaController@store');

Route::post('show_notifications/{id}','Api\NotificacionController@show');