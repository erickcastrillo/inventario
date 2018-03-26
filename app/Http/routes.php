<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Rutas relacionadas al inicio
Route::get('/', 'InicioController@Index' )->name('Dashboard');
Route::get('/home', 'InicioController@Index' )->name('Dashboard');



// Rutas de las entradas
Route::get('/Entradas', 'EntradaController@Index')->name('Todas las entradas');
Route::get('/Entradas/Editar/{id}', 'EntradaController@edit')->name('Editar entrada');
Route::get('/Entradas/Ver/{id}', 'EntradaController@show')->name('Editar entrada');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin')->name('Iniciar sesión');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister')->name('Nuevo registro');
Route::post('auth/register', 'Auth\AuthController@postRegister');