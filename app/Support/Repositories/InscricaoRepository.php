<?php

namespace App\Support\Repositories;

use App\Base\BaseRepository;
use App\Models\Candidato;
use App\Models\Inscricao;

class InscricaoRepository extends BaseRepository
{
    /**
     * CandidatoRepository constructor.
     * @param Inscricao $candidato
     */
    public function __construct(Inscricao $inscricao)
    {
        parent::__construct($inscricao);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param Candidato $candidato
     * @param $transferenciaId
     * @param $processoSeletivoId
     */
    public function inscreverCandidato(Candidato $candidato, $transferenciaId, $processoSeletivoId)
    {
        return $candidato->transferencias()->attach($transferenciaId, ['processo_seletivo_id' => $processoSeletivoId]);
    }

    public function countQuantidadeInscricoesProcessoAtual($candidatoId, $processoSeletivoAtualId)
    {
        return $this->model
            ->where('candidato_id', '=', $candidatoId)
            ->where('processo_seletivo_id', '=', $processoSeletivoAtualId)
            ->count();
    }

    public function getInfoInscricao($candidatoId, $processoSeletivoAtualId)
    {
        $info = [];

        $info['inscricao'] = $this->model
            ->where('candidato_id', '=', $candidatoId)
            ->where('processo_seletivo_id', '=', $processoSeletivoAtualId)
            ->with('transferencia')
            ->first();

        $info['curso'] = $info['inscricao']->transferencia->curso;
        $info['campi'] = $info['inscricao']->transferencia->campi;

        return $info;
    }
}