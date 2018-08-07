<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{

	//sólo aceptará de un request el nombre y el slug
	protected $fillable = ['name','slug'];

    // una etiqueta puede puede tener muchos posts y pertenecer a muchos posts
    public function posts()
    {
    	return $this->belongsToMany(Post::class);
    }
}
