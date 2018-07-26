<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// $this->truncateTables([
     // 		"users",
     // 		"viajes"
     // 	]);

        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'usuario' => 'admin',
            'avatar' => 'img/avatars/admin.png'
        ]);

        //a cada usuario le ponemos uno, alguno o todos los viajes
        factory(App\User::class,40)->create()->each(
			function($user) {
				$faker = Faker::create();

				$limit = $faker->numberBetween(1,10);

				for ($i=0; $i < $limit; $i++) {
					$idViaje = $i;

					$viaje = \App\Viaje::find($idViaje);


					$user->viajes()->attach($viaje);
				}

			}
		);


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

    
}
