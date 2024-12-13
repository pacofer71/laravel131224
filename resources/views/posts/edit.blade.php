@extends('plantillas.principal')
@section('titulo')
Editar
@endsection
@section('cabecera')
Editar Post
@endsection
@section('contenido')
<div class="p-4 rounded-xl shadow-xl border-2 border-black w-3/4 mx-auto">
    <form action="{{route('posts.update', $post)}}" method="POST">
        @csrf
        @method('PUT')
        <!-- Título -->
        <div class="mb-4">
            <label for="titulo" class="block text-gray-700 font-semibold mb-2">Título</label>
            <input type="text" value="{{@old('titulo', $post->titulo)}}" id="titulo" name="titulo" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Escribe el título">
            @error('titulo')
            <x-error>
                {{$message}}
            </x-error>
            @enderror
        </div>

        <!-- Contenido -->
        <div class="mb-4">
            <label for="contenido" class="block text-gray-700 font-semibold mb-2">Contenido</label>
            <textarea id="contenido" name="contenido" class="w-full p-3 border border-gray-300 rounded-lg" rows="4" placeholder="Escribe el contenido aquí">{{@old('contenido', $post->contenido)}}</textarea>
            @error('contenido')
            <x-error>
                {{$message}}
            </x-error>
            @enderror
        </div>

        <!-- Estado -->
        <div class="mb-4">
            <span class="block text-gray-700 font-semibold mb-2">Estado</span>
            <div class="flex items-center space-x-4">
                <label class="inline-flex items-center">
                    <input type="radio" @checked(@old('categoria', $post->categoria)=='Publicado') 
                    name="categoria" value="Publicado" class="form-radio text-blue-500">
                    <span class="ml-2">Publicado</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" @checked(@old('categoria', $post->categoria)=='Borrador')  
                    name="categoria" value="Borrador" class="form-radio text-blue-500">
                    <span class="ml-2">Borrador</span>
                </label>
            </div>
            @error('categoria')
            <x-error>
                {{$message}}
            </x-error>
            @enderror
        </div>

        <!-- Botones -->
        <div class="flex items-center justify-between">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none">
                <i class="fas fa-paper-plane"></i> Enviar
            </button>
            <a href="{{route('posts.index')}}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 focus:outline-none text-center">
                <i class="fas fa-times-circle"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection