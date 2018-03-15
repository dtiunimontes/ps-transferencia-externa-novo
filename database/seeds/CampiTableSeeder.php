<?php

use Illuminate\Database\Seeder;

class CampiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Campi::class, 20)->create();
    }
}
