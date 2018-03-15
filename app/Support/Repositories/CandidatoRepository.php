<?php

namespace App\Support\Repositories;

use App\Models\Candidato;
use App\Base\BaseRepository;

class CandidatoRepository extends BaseRepository
{
    /**
     * CandidatoRepository constructor.
     * @param Candidato $candidato
     */
    public function __construct(Candidato $candidato)
    {
        parent::__construct($candidato);
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