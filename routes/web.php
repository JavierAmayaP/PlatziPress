<?php

use Illuminate\Support\Facades\Route;

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

// Creación de la ruta encargada de mostrar todos los post
Route::get('/', 'PageController@posts');
// Creación de la ruta para visualizar un post en especifico
Route::get('blog/{post}', 'PageController@post')->name('post');

/* 
    1.se utiliza \ en la ruta debido a que no estamos accediendo 
    a una ruta de una carpeta sino al acceso directo a la entidad Backend.

    2.Se excluye le método 'show debido a que ya existe en la parte publica
      y en el backen no necesito un boton para mostrarl los post.

*/

Route::resource('posts','Backend\PostController')
     ->middleware('auth')
     ->except('show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
