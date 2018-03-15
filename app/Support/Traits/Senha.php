<?php

namespace App\Support\Traits;

use App\Models\Candidato;
use Illuminate\Http\Request;

trait Senha
{
    protected function alterarSenha(Request $request, Candidato $candidato)
    {
        $senha = $request->input('password');

        if (empty($senha)) {
            return;
        }

        $novaSenha = $request->input('new_password');
        $novaSenhaConfirmacao = $request->input('new_password_confirmation');

        if ($this->compararSenhas($senha, $candidato->password) and ($novaSenha === $novaSenhaConfirmacao) and ( ! empty($novaSenha))) {
            $candidato->password = bcrypt($novaSenha);
            $candidato->save();
            return;
        }
    }

    private function compararSenhas($senhaAtualForm, $senhaAtualDatabase)
    {
        return \Hash::check($senhaAtualForm, $senhaAtualDatabase);
    }
}