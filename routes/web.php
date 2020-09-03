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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
