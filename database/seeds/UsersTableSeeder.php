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

		factory(App\User::class,38)->create();	
		// $faker = Faker::create();

		// $limit = $faker->numberBetween(1,10);

		// for ($i=0; $i < $limit; $i++) {
		// 	$idViaje = $i;

		// 	$viaje = \App\Viaje::find($idViaje);


		// 	$user->viajes()->attach($viaje);
		// }
		// fuente: http://notasweb.com/grupo/principiantes/tema/numeros-aleatorios-que-no-se-repitan.html
		factory(App\User::class, 38)->create()->each(function(App\User $user){
       		rand(1,3),
   			rand(4,6),
   			rand(7,10),
       		
       	});
    }
}

 

 		// 	$numeros=array();  
			// $i=0;  
			// $lim = rand(1,10);
			// while($i<$lim)  
			// {  
			//     $num=rand(1,10);  
			//     if(in_array($num,$numeros)===false)  
			//     {  
			//         array_push($numeros,$num);  
			//         $i++;
			//         $user->viajes()->attach($num);  
			//     }  
			// } 
 
    