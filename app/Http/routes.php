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


Route::resource('Entrada', 'EntradaController',
['names' => 
    [
        'index' => 'Todas las entradas',
        'edit' => 'Editar entrada',
        'show' => 'Mostrar entrada',
        'create' => 'Crear entrada',
        'update' => 'Actualizar entrada',
        'destroy' => 'Borrar entrada',
    ]
]);

Route::resource('Devolucion', 'DevolucionController',
['names' => 
    [
        'index' => 'Todas las devoluciones',
        'edit' => 'Editar devolucion',
        'show' => 'Mostrar devolucion',
        'create' => 'Crear devolucion',
        'update' => 'Actualizar devolucion',
        'destroy' => 'Borrar devolucion',
    ]
]);

Route::resource('Traslado', 'TrasladoController',
['names' => 
    [
        'index' => 'Todas los traslados',
        'edit' => 'Editar traslado',
        'show' => 'Mostrar traslado',
        'create' => 'Crear traslado',
        'update' => 'Actualizar traslado',
        'destroy' => 'Borrar traslado',
    ]
]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin')->name('Iniciar sesión');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister')->name('Nuevo registro');
Route::post('auth/register', 'Auth\AuthController@postRegister');