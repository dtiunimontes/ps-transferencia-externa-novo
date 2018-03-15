<?php

namespace App\Support\Traits;

trait Datas
{
    public function converterParaFormatoUSA($data)
    {
        list($dia, $mes, $ano) = explode('/', $data);
        return $ano . '-' . $mes . '-' . $dia;
    }

    public static function converterFormatoUSAParaBRSemBarras($data)
    {
        list($ano, $mes, $dia) = explode('-', $data);
        return $dia . '' . $mes . '' . $ano;
    }
}