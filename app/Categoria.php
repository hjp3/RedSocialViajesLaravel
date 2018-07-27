<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // todos los campos van a ser llenados en un formulario
	protected $guarded = [];

	// una categoria puede puede tener muchos posts
    public function posts()
    {
    	return $this->hasMany(Post::class);
    }
}
