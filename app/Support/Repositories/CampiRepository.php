<?php

namespace App\Support\Repositories;

use App\Models\Campi;
use App\Base\BaseRepository;

class CampiRepository extends BaseRepository
{
    /**
     * CandidatoRepository constructor.
     * @param Campi $campi
     */
    public function __construct(Campi $campi)
    {
        parent::__construct($campi);
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