<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    public function processosSeletivo()
    {
        return $this->belongsTo(ProcessoSeletivo::class);
    }

    public function candidatos()
    {
        return $this->belongsToMany(Candidato::class, 'inscricoes')
            ->withTimestamps();
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function campi()
    {
        return $this->belongsTo(Campi::class);
    }
}
