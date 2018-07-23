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
            $table->unsignedInteger('user_id')->nullable();   // nos relacionamos con las otras tablas
            $table->unsignedInteger('viaje_id')->nullable();   // serán valores positivos,son las ids
            //$table->timestamps();

            // la columna user_id es una rerencia de la id un usuario en la tabla viajes
            $table->foreign('user_id')->references('id')->on('viajes');
            $table->foreign('viaje_id')->references('id')->on('users');
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
