<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProcessoSeletivoController extends Controller
{
    public function colocarProcessoSeletivoNaSessao(Request $request)
    {
        $processoSeletivoTitulo = $request->input('processoSeletivoTitulo');

        session(['processoSeletivoAtivo' => $processoSeletivoTitulo]);

        return response()->json(['message' => 'success']);
    }
}
