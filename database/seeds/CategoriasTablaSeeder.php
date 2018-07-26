<?php

use Illuminate\Database\Seeder;

class CategoriasTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Categoria::class, 20)->create();   // ejecutamos el factory
    }
}
