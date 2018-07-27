<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	// todos los campos van a ser llenados en un formulario
	protected $fillable = ['titulo','slug','extracto','cuerpo','status','imagen'];

	// un post pertenece a un usuario
	public function user(){
		return $this->belongsTo(User::class, 'user_id');
	}

	// un post pertenece a una categoria
	public function categoria(){
		return $this->belongsTo(Categoria::class);
	}

	// un post puede puede tener muchas etiquetas y pertenecer a muchas etiquetas
    public function etiquetas()
    {
    	return $this->belongsToMany(Etiqueta::class);
    }
}


// $table->increments('id');
//             $table->integer('user_id')->unsigned();  
//             $table->integer('categoria_id')->unsigned();

//             $table->string('titulo',128);  // el título igual al slug
//             $table->string('slug',128);

//             $table->mediumText('extracto')->nullable();
//             $table->text('cuerpo');
//             // le ponemos valores constantes
//             $table->enum('status',['PUBLICADO','BORRADOR'])->default('BORRADOR'); 

//             $table->string('imagen',128)->nullable();