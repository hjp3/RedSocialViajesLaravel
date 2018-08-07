<?php

use Faker\Generator as Faker;

$factory->define(App\Categoria::class, function (Faker $faker) {
    $nombre = $faker->sentence(4); // oración de 4 palabras, definimos la variable
    return [
        'nombre' => $nombre,
        'slug' => str_slug($nombre),   // convertimos cualquier string a slug
    	'cuerpo' => $faker->text(500),   // texto de 500 caracteres
    ];
});
