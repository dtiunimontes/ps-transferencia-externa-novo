<?php

namespace App\Support\Repositories;

use App\Models\Curso;
use App\Base\BaseRepository;

class CursoRepository extends BaseRepository
{
    /**
     * CandidatoRepository constructor.
     * @param Curso $curso
     */
    public function __construct(Curso $curso)
    {
        parent::__construct($curso);
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