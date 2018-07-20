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
 
// mostramos todos los viajes que participa el usuario 1
// obtenemos las id de viajes relacionadas con el usuario
// en el archivo de web, la pag principal (/)
// $user = App\user::findOrFail(1);
// devolvemos la relación del usuario con el viaje
// return $user->roles; 

// mostramos los usuarios que participaron del viaje uno
// $viaje = App\viaje::findOrFail(1);
// return $viaje->users;

// más dinámico, le asignamos a un usuario x un viaje_x:
// buscamosal usuario
// $user = App\user::findOrFail($usuario_x);
// llamamos al objeto user, a la relación roles, le adjuntamos un viaje_sx
// $user->viajes()->attach($viaje_x);
// mostramos sus viajes
// return $user->roles;

// para borrar un viaje de un usuario
// $user->viajes()->detach($viaje_x);

// método sync()
// agrega un viaje al usuario una sola vez 
// $user->viajes()->sync($viaje_x);