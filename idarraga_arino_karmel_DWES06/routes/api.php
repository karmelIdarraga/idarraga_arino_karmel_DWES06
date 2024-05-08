<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('v4/public/pistas/get', 'App\Http\Controllers\PistaController@getAll');

Route::get('v4/public/pistas/get/{id}', 'App\Http\Controllers\PistaController@getPistaById');

Route::get('v4/public/reservas/get', 'App\Http\Controllers\ReservaController@getAll');

Route::post('v4/public/reservas/add', 'App\Http\Controllers\ReservaController@addReserva');

Route::put('v4/public/reservas/confirmar/{id}', 'App\Http\Controllers\ReservaController@confirmarReserva');

Route::delete('v4/public/reservas/anular/{id}', 'App\Http\Controllers\ReservaController@deleteReserva');


Route::get('v4/public/jugadores/get', 'App\Http\Controllers\JugadorController@getAll');

Route::get('v4/public/jugadores/get/nivel/{nivel}', 'App\Http\Controllers\JugadorController@getByNivel');

Route::post('v4/public/jugadores/add', 'App\Http\Controllers\JugadorController@addJugador');
