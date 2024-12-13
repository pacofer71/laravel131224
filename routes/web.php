<?php

use App\Http\Controllers\BasuraController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('uno');
})->name('nombresdadopormi');
Route::get('/misposts', function(){
    return "Ruta posts";
});
Route::get('/basura', [BasuraController::class, 'inicio']);
Route::resource('posts', PostController::class);