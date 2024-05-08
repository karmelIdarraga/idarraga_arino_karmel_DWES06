<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('API/v3/public/pistas/get', 'App\Http\Controllers\PistaController@getAll');

//Route::get('API/v3/public/pistas/get/{id}', 'App\Http\Controllers\PistaController@getPistaById');

//Route::get('API/v3/public/reservas/get', 'App\Http\Controllers\ReservaController@getAll');

//Route::post('API/v3/public/reservas/add', 'App\Http\Controllers\ReservaController@addReserva');