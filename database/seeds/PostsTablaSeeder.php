<?php

use Illuminate\Database\Seeder;

class PostsTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// cada vez que se crea un post
    	// va a existir una relación con la etiqueta
        // en la función anónima le pasamos como parámetro el post que se crea
       // y a ese argumento le pasamos un array que se relaciona con tres
    	// etiquetas en forma aleatoria
    	// la relación se produce con el método 
       factory(App\Post::class, 100)->create()->each(function(App\Post $post){
       		$post->etiquetas()->attach([
       			rand(1,5),
       			rand(6,14),
       			rand(15,20),
       		]);
       });
    }
}
