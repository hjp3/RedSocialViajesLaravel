<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
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

        ]):


        App\User::create([
            'name' => 'Usuario 1',
            'email' => 'usuario1@usuario1.com',
            'password' => bcrypt('123456'),
            'usuario' => 'uno',
            'avatar' => 'img/avatars/avatar1.png'
        ]):

			
		$faker = Faker::create();

		$limit = $faker->numberBetween(1,10);

		for ($i=0; $i < $limit; $i++) {
			$idViaje = $i;

			$viaje = \App\Viaje::find($idViaje);


			$user->viajes()->attach($viaje);
		}

			
		

    }
        // no selecciona a los usuarios aleatoriamente
  //       factory(App\User::class, 50)->create();

		// $viajes = App\Viaje::all();

		// // Populate the pivot table
		// App\User::all()->each(function ($user) use ($viajes) { 
		//     $aleatorio = rand(1,10);
		//     $viaje = $viajes->find($aleatorio);
		//     $user->viajes()->attach($viaje); 
		// });

    

    
}
