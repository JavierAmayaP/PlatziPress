<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //Creación de método de presentación de los post

    public function posts()
    {
        /* 
            Para retornar informción a la vista el método view
            recibe como parámetros 
            1.-El nombre de la vista
            2.-La data que nosotros procesamos.
        */
        return view('posts',[
            'posts' => Post::with('user')->latest()->paginate()
        ]);
    }

    // La variable utilizada como parámetro debe coincidir
    // con el nombre del parámetro de la ruta
    public function post(Post $post)
    {
        return view('post',[
            'post' => $post
        ]);
    }
}
