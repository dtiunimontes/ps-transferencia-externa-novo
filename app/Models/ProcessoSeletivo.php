<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessoSeletivo extends Model
{
    protected $table = 'processos_seletivos';

    protected $fillable = [
        'titulo',
        'ativo'
    ];

    const ATIVO = 1;
    const INATIVO = 0;

    public function scopeAtivos($query)
    {
        return $query->where('ativo', '=', self::ATIVO);
    }
}
