<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
	protected $guarded = [];
    //protected $fillable = ['titulo','descripcion','fecha_partida','fecha_regreso','portada'];

	// un viaje puede pertener a muchos usuarios y tener muchos usuarios
    public function users()
    {
    	return $this->belongsToMany(User::class);
    }
}
