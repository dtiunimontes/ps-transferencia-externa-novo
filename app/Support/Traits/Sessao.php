<?php

namespace App\Support\Traits;

trait Sessao
{
    protected function destruirSessao($nome)
    {
        session()->forget($nome);
    }

    protected function setarSessao($nome, $valor)
    {
        session([$nome => $valor]);
    }
}