<?php

use Illuminate\Database\Seeder;

class ProcessoSeletivoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\ProcessoSeletivo::class, 10)->create();
    }
}
