<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    //campos que vamos a permitir rellenar desde formularios
    protected $fillable=['titulo', 'contenido', 'categoria'];
}
