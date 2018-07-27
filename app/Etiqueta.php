<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    // una etiqueta puede puede tener muchos posts y pertenecer a muchos posts
    public function posts()
    {
    	return $this->belongsToMany(Post::class);
    }
}
