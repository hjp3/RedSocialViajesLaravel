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

// página principal
Route::get('/', function () {
    return view('index');
});


// páginas secundarias de la página principal
Route::get('/faq', 'PaginaController@faq');

Route::get('/contactos', 'PaginaController@contactos');

Route::get('/quienes_somos', 'PaginaController@quienes_somos');


// rutas usuarios/login
Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('users','UserController');   // accedemos a todas las rutas/métodos de user

// home del usuario
Route::get('/home', 'HomeController@index')->name('home');




// rutas viajes
Route::resource('viaje','ViajeController');   // accedemos a todas las rutas/métodos de viaje

Route::get('/viajeUsers/{id}', 'ViajeController@usuariosAnotados')->name('usuarios_viajes');


Route::get('/anotarUsuarioViaje/{user_id}/{viaje_id}', 'ViajeController@anotarUsuarioViaje')->name('sumar_viaje');

Route::get('/borrarUsuarioViaje/{user_id}/{viaje_id}', 'ViajeController@borrarUsuarioViaje')->name('borrar_viaje');

Route::get('/userViajes/{id}', 'UserController@viajesAnotados')->name('viajes_usuarios');


// Rutas del módulo blog
// todos los posts, le ponemos blog a la ruta
Route::get('blog','BlogController@blog')->name('blog');
Route::get('usuarioBlog','BlogController@usuarioBlog')->name('usuarioBlog');

// todos los posts de un usuario
Route::get('blogUsuario/{id}','BlogController@blogUsuario')->name('blogUsuario');
// un post en particular
Route::get('post/{id}','BlogController@post')->name('post');
Route::get('categoria/{id}','BlogController@categoria')->name('categoria');
Route::get('etiqueta/{id}','BlogController@etiqueta')->name('etiqueta');


// usuario blog
Route::resource('etiquetas','EtiquetaController'); 
Route::resource('categorias','CategoriaController'); 


Route::resource('posts','PostController'); 
Route::get('indexado/{id}','PostController@indexado')->name('postsIndexados');


// administrador
Route::get('/admin','AdminController@index')->name('admin');
 
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