<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $titulo = $faker->sentence(4); // oración de 4 palabras
    return [
    	'user_id' => rand(2,40),   // le ponemos un número aleatorio de 1 a 40
        'categoria_id' => rand(1,20), 
        'titulo' => $titulo,
        'slug' => str_slug($titulo),   // convertimos cualquier string a slug
        'extracto' => $faker->text(200),
    	'cuerpo' => $faker->text(500),   // texto de 500 caracteres
    	'status' => $faker->randomElement(['BORRADOR','PUBLICADO']),
        'imagen' => $faker->imageUrl($width = 640, $height = 480),
    ];
});
