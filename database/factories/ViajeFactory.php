<?php

use Faker\Generator as Faker;

$factory->define(App\Viaje::class, function (Faker $faker) {
    return [
        'titulo' => $faker->country,
        'descripcion' => $faker->text($maxNbChars = 200),
        'fecha_partida' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'fecha_regreso' => $faker->date($format = 'Y-m-d', $max = 'now'),
        //'portada' => 'img/portada/foto' . $faker->numberBetween(1, 5) . '.png'
        'portada' => $faker->imageUrl($width = 640, $height = 480),
    ];
});
