<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Contacto::class, function (Faker $faker) {
    return [
    	'user_id' =>rand(2,75),
        'texto' => $faker->text(300),
    ];
});
