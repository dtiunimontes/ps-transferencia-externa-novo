<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'processo_seletivo_id',
        'inicio_inscricoes',
        'termino_inscricoes',
        'rp_etapa_1',
        'rf_etapa_1',
        'rp_etapa_2',
        'rf_etapa_2',
        'recurso_etapa_1',
        'recurso_etapa_2',
        'data_venc_dae',
        'data_venc_dae_indeferidos',
        'mes_referencia_dae',
    ];

    public $timestamps = false;
}
