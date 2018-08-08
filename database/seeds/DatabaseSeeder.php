<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
    	$this->call(CategoriasTablaSeeder::class);
        $this->call(EtiquetasTablaSeeder::class);
        $this->call(ViajesSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTablaSeeder::class);
        $this->call(ContactosTableSeeder::class);
        
        
    }
}
