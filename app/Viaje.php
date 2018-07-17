<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    protected $fillable = ['titulo','descripcion','fecha_partida','fecha_regreso','portada'];
}
