<?php

use App\Models\Candidato;
use App\Models\Inscricao;
use App\Models\PerfilCandidato;
use App\Models\ProcessoSeletivo;
use App\Models\Transferencia;
use Illuminate\Database\Seeder;

class CandidatoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transferencias = Transferencia::all();
        $processosSeletivos = ProcessoSeletivo::ativos()->get();

        factory(Candidato::class, 500)
            ->create()
            ->each(function (Candidato $candidatoModel) use ($transferencias, $processosSeletivos){

                $processoSeletivo = $processosSeletivos->random();
                $transferencia = $transferencias->random();

                factory(PerfilCandidato::class)
                    ->create([
                        'candidato_id' => $candidatoModel->id,
                    ]);

                factory(Inscricao::class)
                    ->create([
                        'candidato_id' => $candidatoModel->id,
                        'processo_seletivo_id' => $processoSeletivo->id,
                        'transferencia_id' => $transferencia->id,
                    ]);
            });
    }
}
