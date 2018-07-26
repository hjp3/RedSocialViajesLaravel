<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,38)->create();

        App\User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'usuario' => 'admin',
            'avatar' => 'img/avatars/admin.png'

        ]);


        App\User::create([
            'name' => 'Usuario 1',
            'email' => 'usuario1@usuario1.com',
            'password' => bcrypt('123456'),
            'usuario' => 'uno',
            'avatar' => 'img/avatars/avatar1.png'
        ]);

			
		// $faker = Faker::create();

		// $limit = $faker->numberBetween(1,10);

		// for ($i=0; $i < $limit; $i++) {
		// 	$idViaje = $i;

		// 	$viaje = \App\Viaje::find($idViaje);


		// 	$user->viajes()->attach($viaje);
		// }
    }
}
