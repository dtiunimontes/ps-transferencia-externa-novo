<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        $this->call(ProcessoSeletivoTableSeeder::class);
        $this->call(CampiTableSeeder::class);
        $this->call(CursosTableSeeder::class);
        $this->call(TransferenciasTableSeeder::class);
        $this->call(CandidatoTableSeeder::class);
    }
}
