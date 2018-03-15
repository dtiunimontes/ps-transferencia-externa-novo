<?php

use App\Models\Campi;
use App\Models\Curso;
use App\Models\ProcessoSeletivo;
use App\Models\Transferencia;
use Illuminate\Database\Seeder;

class TransferenciasTableSeeder extends Seeder
{
    private $id = 1;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campi = Campi::all();
        $cursos = Curso::all();
        $processosSeletivos = ProcessoSeletivo::ativos()->get();

        $self = $this;

        foreach ($processosSeletivos as $processoSeletivo) {
            factory(Transferencia::class, 20)
                ->make()
                ->each(function (Transferencia $transferenciaModel) use ($campi, $cursos, $processoSeletivo, $self) {

                    $cursoRandom = $cursos->random();
                    $campiRandom = $campi->random();

                    $transferenciaModel->id = $self->id;
                    $transferenciaModel->campi_id = $campiRandom->id;
                    $transferenciaModel->curso_id = $cursoRandom->id;
                    $transferenciaModel->processo_seletivo_id = $processoSeletivo->id;
                    $transferenciaModel->save();
                    $self->id++;
                });

            $self->id = 1;
        }
    }
}
