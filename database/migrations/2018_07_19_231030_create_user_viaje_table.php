<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserViajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_viaje', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned;   // nos relacionamos con las otras tablas
            $table->integer('viaje_id')->unsigned;   // serán valores positivos,son las ids
            $table->timestamps();

            // la columna user_id es una rerencia de la id un usuario en la tabla viajes
            $table->foreing('user_id')->references('id')->on('viajes');
            $table->foreing('viaje_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_viaje');
    }
}
