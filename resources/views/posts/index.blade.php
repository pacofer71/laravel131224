@extends('plantillas.principal')
@section('titulo')
Inicio
@endsection
@section('cabecera')
Listado de Posts
@endsection
@section('contenido')
<div class="relative overflow-x-auto">
    <div class="flex flex-row-reverse mb-2">
        <a href="{{route('posts.create')}}" class="px-2 py-1 rounded-xl text-white font-bold bg-blue-500 hover:bg-blue-700">
            <i class="fas fa-add"></i> NUEVO
        </a>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    TITULO
                </th>
                <th scope="col" class="px-6 py-3">
                    CONTENIDO
                </th>
                <th scope="col" class="px-6 py-3">
                    CATEGORIA
                </th>
                <th scope="col" class="px-6 py-3">
                    ACCIONES
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->titulo}}
                </th>
                <td class="px-6 py-4">
                    {{$item->contenido}}
                </td>
                <td @class([
                    'px-6 py-4 font-bold' , 
                    'text-red-500 line-through'=>$item->categoria=='Borrador',
                    'text-blue-500'=>$item->categoria=='Publicado'
                    ])>
                    {{$item->categoria}}
                </td>
                <td class="px-6 py-4">
                    <form method="POST" action="{{route('posts.destroy', $item)}}">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('posts.edit', $item)}}"><i class="fas fa-edit  hover:text-xl"></i></a>
                        <button type="submit"><i class="fas fa-trash text-red-400 hover:text-xl"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-2">
        {{$posts->links()}}
    </div>
</div>
@endsection
@section('alertas')
@if(@session('mensaje'))
<x-alerta>
    {{session('mensaje')}}
</x-alerta>
@endif
@endsection