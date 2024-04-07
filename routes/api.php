<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/mostrar-personas', 'App\Http\Controllers\PersonaController@index'); 
Route::post('/agregar-persona', 'App\Http\Controllers\PersonaController@store'); 
Route::get('/buscar-persona/{personaid}', 'App\Http\Controllers\PersonaController@show'); 
Route::put('/actualizar-persona/{personaid}', 'App\Http\Controllers\PersonaController@update'); 
Route::delete('/borrar-persona/{personaid}', 'App\Http\Controllers\PersonaController@destroy'); 

Route::post('/persona/tramite', 'App\Http\Controllers\PersonaController@agregarServicio'); 


Route::get('/mostrar-tramites', 'App\Http\Controllers\TramiteController@index'); 
Route::post('/agregar-tramite', 'App\Http\Controllers\TramiteController@store'); 
Route::get('/buscar-tramite/{tramiteid}', 'App\Http\Controllers\TramiteController@show'); 
Route::put('/actualizar-tramite/{tramiteid}', 'App\Http\Controllers\TramiteController@update'); 
Route::delete('/borrar-tramite/{tramiteid}', 'App\Http\Controllers\TramiteController@destroy'); 


