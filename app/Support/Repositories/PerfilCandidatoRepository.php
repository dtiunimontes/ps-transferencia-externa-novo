<?php

namespace App\Support\Repositories;

use App\Models\PerfilCandidato;
use App\Base\BaseRepository;

class PerfilCandidatoRepository extends BaseRepository
{
    /**
     * PerfilCandidatoRepository constructor.
     * @param PerfilCandidato $perfilCandidato
     */
    public function __construct(PerfilCandidato $perfilCandidato)
    {
        parent::__construct($perfilCandidato);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function findByCandidatoId($id)
    {
        return $this->model
            ->with('candidato')
            ->where('candidato_id', '=', $id)
            ->first();
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }
}