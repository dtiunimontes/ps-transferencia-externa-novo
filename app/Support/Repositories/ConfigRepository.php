<?php

namespace App\Support\Repositories;

use App\Models\Config;
use App\Base\BaseRepository;

class ConfigRepository extends BaseRepository
{
    /**
     * CandidatoRepository constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        parent::__construct($config);
    }
}