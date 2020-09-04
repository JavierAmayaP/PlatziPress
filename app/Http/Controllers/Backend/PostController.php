<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Imprimir todos los post y retornarlos a la vista

        $posts = Post::latest()->get();

        /* Usando arreglos para retornar a la vista
        return view('posts.index',[
            'posts' => $posts
        ]); 
        */

        /*
         Usando el método compact para devolver datos a la vista
         Compact() crea un array asociativo el nombre de la variable y sus valores
        */
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retornamos la vista post.create
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // dd($request->all());
        //salvar información
        $post = Post::create([
            // El user_id se rellena con el id del usuario logueado
            'user_id' => auth()->user()->id
        ] + $request->all());

        // trabajar con imagenes
        /* 
            Si recibimos un archivo debemos salvarlos en nuestro proyecto
            para despues almacenar la url de ese archivo en la base de datos.
            Nunca guardamos un archivo como tal en la base de datos.

         */

        if ($request->file('file')) {
            /*
             Enviamos la imagen al servidor con el método store
             store() -> Store the uploaded file on a filesystem disk.
             El orden de store es el siguiente guardame dentro de public
             en la acrpeta store la imagen y almacena la ruta en el campo image del post.
            */
            $post->image = $request->file('file')->store('posts', 'public');

            // Salvamos la información
            $post->save();
        }

        // retornar resultado
        // EL método back crea una solicitud de redirección 
        // hacia la ultima ubicación antes de disparar este método
        return back()->with('status', 'Creado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        // 1.Recibe los datos validados correctamente por nuestra validación independiente
        $post->update($request->all());

        // 2.Eliminar imagen anterior
        Storage::disk('public')->delete($post->image);

        // 3.Al actualizar debo eliminar la imagen para colocar la nueva
        if ($request->file('file')) {
            $post->image = $request->file('file')->store('posts', 'public');
            $post->save();
        }

        // retornar feedback al usuario
        return back()->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Eliminación de una imagen
        Storage::disk('public')->delete($post->image);

        //Eliminar un post usando delete
        $post->delete();

        // Creamos una redirección a la vista anterior 
        // enviando feedback al usuario
        // usando una variable flash

        return back()->with('status', 'Eliminado con éxito');
    }
}
