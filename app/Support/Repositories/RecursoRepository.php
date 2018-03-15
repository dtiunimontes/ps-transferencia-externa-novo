<?php

namespace App\Support\Repositories;

use App\Models\Recurso;
use App\Base\BaseRepository;

class RecursoRepository extends BaseRepository
{
    /**
     * CandidatoRepository constructor.
     * @param Recurso $recurso
     */
    public function __construct(Recurso $recurso)
    {
        parent::__construct($recurso);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }
}