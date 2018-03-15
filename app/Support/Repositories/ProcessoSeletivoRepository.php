<?php

namespace App\Support\Repositories;

use App\Models\ProcessoSeletivo;
use App\Base\BaseRepository;

class ProcessoSeletivoRepository extends BaseRepository
{
    /**
     * ProcessoSeletivoRepository constructor.
     * @param ProcessoSeletivo $processoSeletivo
     */
    public function __construct(ProcessoSeletivo $processoSeletivo)
    {
        parent::__construct($processoSeletivo);
    }

    /**
     * @return mixed
     */
    public function getUltimoAtivo()
    {
        return $this->model->ativos()->orderBy('created_at', 'desc')->first();
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
    }
}