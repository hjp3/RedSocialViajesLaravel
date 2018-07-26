<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();  
            $table->integer('categoria_id')->unsigned();

            $table->string('titulo',128);  // el título igual al slug
            $table->string('slug',128);

            $table->mediumText('extracto')->nullable();
            $table->text('cuerpo');
            // le ponemos valores constantes
            $table->enum('status',['PUBLICADO','BORRADOR'])->default('BORRADOR'); 

            $table->string('imagen',128)->nullable();

            $table->timestamps();

            // relaciones
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');   // eliminamos/ac los post del usuario en cascada
            
            $table->foreign('categoria_id')->references('id')->on('categorias')
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
        Schema::dropIfExists('posts');
    }
}
