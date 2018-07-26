<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtiquetaPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etiqueta_post', function (Blueprint $table) {
            $table->increments('id');

            // un post puede tener muchas etiquetas y viceversa
            $table->integer('etiqueta_id')->unsigned();  
            $table->integer('post_id')->unsigned();
            
            $table->timestamps();

            $table->foreign('etiqueta_id')->references('id')->on('etiquetas')
                ->onDelete('cascade')
                ->onUpdate('cascade');   // eliminamos/ac los post del usuario en cascada
            
            $table->foreign('post_id')->references('id')->on('posts')
                ->onDelete('cascade')
                ->onUpdate('cascade');   // eliminamos/ac los post del usuario en cascada
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etiqueta_post');
    }
}
