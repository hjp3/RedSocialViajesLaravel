<?php

use Faker\Generator as Faker;

$factory->define(App\Etiqueta::class, function (Faker $faker) {
    $nombre = $faker->unique->word(5); // palabra de 5 caracteres
    return [
        'nombre' => $nombre,    // nombre
        'slug' => str_slug($nombre),   // convertimos cualquier string a slug
    ];
});
