<?php

namespace App\Support\Repositories;

use App\Base\BaseRepository;
use App\Models\Transferencia;

class TransferenciaRepository extends BaseRepository
{
    /**
     * TransferenciaRepository constructor.
     * @param Transferencia $transferencia
     */
    public function __construct(Transferencia $transferencia)
    {
        parent::__construct($transferencia);
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
     * @param $processoSeletivoId
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getByProcessoSeletivo($processoSeletivoId)
    {
        return $this->model->where('processo_seletivo_id', '=', $processoSeletivoId)->get();
    }
}