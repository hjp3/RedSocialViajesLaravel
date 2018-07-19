<?php

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
    return view('index');
});

Route::get('/faq', 'PaginaController@faq');

Route::get('/contactos', 'PaginaController@contactos');

Route::get('/somos', 'PaginaController@quienes_somos');

Auth::routes();

Route::resource('viaje','ViajeController');   // accedemos a todas las rutas/métodos de viaje

Route::resource('users','UserController');   // accedemos a todas las rutas/métodos de user


Route::get('/home', 'HomeController@index')->name('home');
