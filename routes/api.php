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

Route::get('areas','AreaController@index');
Route::get('area/{idzona}/show','AreaController@get_area');

Route::get('zonas','ZonaController@index');

Route::get('habitaciones','HabitacionController@index');

Route::get('servicios','ServicioController@index');

// Route::post('save_area','AreaController@store');