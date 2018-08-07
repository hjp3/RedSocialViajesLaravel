<?php

use Illuminate\Database\Seeder;

class ViajesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Viaje::class,10)->create();
    }
}
