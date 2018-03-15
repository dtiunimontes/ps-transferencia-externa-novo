<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Candidato extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nome', 'email', 'cpf', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function perfil()
    {
        return $this->hasOne(PerfilCandidato::class, 'candidato_id', 'id');
    }

    public function inscricoes()
    {
        return $this->hasMany(Inscricao::class);
    }

    public function transferencias()
    {
        return $this->belongsToMany(Transferencia::class, 'inscricoes')
            ->withTimestamps();
    }
}
