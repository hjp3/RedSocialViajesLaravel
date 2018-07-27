<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

// $factory->define(App\User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//         'remember_token' => str_random(10),
//     ];
// });


$factory->define(App\User::class, function (Faker $faker) {
	static $password;
	return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123456'),
        'usuario' => $faker->userName,
        //'avatar' => 'img/avatars/foto' . $faker->numberBetween(1, 10) . '.png',
        'avatar' => "img/avatars/foto" . rand(1,10),
         // atring aleatorio para que recordar usuario y no pida datos en el inicio sesión
        'remember_token' => str_random(10),
    ];
});