<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerfilCandidato extends Model
{
    protected $table = 'perfis_candidatos';

    protected $fillable = [
        'candidato_id',
        'rg',
        'orgao_expeditor',
        'data_nascimento',
        'telefone_celular',
        'telefone_fixo',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'cidade',
        'bairro',
        'estado',
    ];

    public function candidato()
    {
        return $this->belongsTo(\App\Models\Candidato::class);
    }
}
