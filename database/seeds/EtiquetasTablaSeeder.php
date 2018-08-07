<?php

use Illuminate\Database\Seeder;

class EtiquetasTablaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Etiqueta::class, 20)->create();
    }
}
