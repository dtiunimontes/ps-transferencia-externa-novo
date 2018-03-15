<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    protected $table = 'inscricoes';

    protected $fillable = [
        'candidato_id',
        'processo_seletivo_id',
        'transferencia_id',
    ];

    public function processoSeletivo()
    {
        return $this->belongsTo(ProcessoSeletivo::class);
    }

    public function transferencia()
    {
        return $this->belongsTo(Transferencia::class);
    }
}
