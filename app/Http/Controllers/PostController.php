<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::orderBy('id', 'desc')->paginate(7);
        //return view('posts.index', ['posts'=>$posts]);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //1.- Validamos los datos
        $request->validate([
            'titulo'=>['required', 'string', 'min:5', 'max:80', 'unique:posts,titulo'],
            'contenido'=>['required', 'string', 'min:10', 'max:250'],
            'categoria'=>['required', 'in:Publicado,Borrador'],
        ]);
        //si la validación falla nos devuelve automaticamente a create
        //2.- Insertamos los datos
        Post::create($request->all());
        //3.- redirigimos a inicio con una sesion que guarde info sobre el evento, en este caso post creado
        return redirect()->route('posts.index')->with('mensaje', 'Se ha creado un post');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //return view('posts.edit', ['manolo'=>$post]);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
          //1.- Validamos los datos
          $request->validate([
            'titulo'=>['required', 'string', 'min:5', 'max:80', 'unique:posts,titulo,'.$post->id], 
            'contenido'=>['required', 'string', 'min:10', 'max:250'],
            'categoria'=>['required', 'in:Publicado,Borrador'],
        ]);
        //si la validación falla nos devuelve automaticamente a edit
        //2.- Actualizamos el dato
        $post->update($request->all());
        //3.- redirigimos a inicio con una sesion que guarde info sobre el evento, en este caso post creado
        return redirect()->route('posts.index')->with('mensaje', 'Se ha editado un post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('mensaje', 'Se ha borrado un post');

    }
}
