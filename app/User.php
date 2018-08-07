<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];
    
    // protected $fillable = [
    //     'name', 'email', 'password','avatar','usuario'
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // un usuario puede tener muchos posts
    public function posts(){
        return $this->hasMany(Post::class);
    }


    // un usuario puede pertenecer a muchos viajes
    // y tener muchos viajes
    // se pasan cuatro parámetros pero si se sigue la convención de laravel sólo se pasa el primero
    //elocuent buscará: el modelo a relacionar, la tabla pivot, llave foránea del de este modelo, llave foránea del modelo a relacionar 
    public function viajes()
    {
        return $this->belongsToMany(Viaje::class);
    }
}
