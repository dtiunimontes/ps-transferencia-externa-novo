<?php

namespace App\Http\Controllers\Candidato;

use App\Http\Requests\CandidatoUpdateFormRequest;
use App\Support\Repositories\CandidatoRepository;
use App\Support\Traits\Senha;
use App\Http\Controllers\Controller;

class CandidatoController extends Controller
{
    use Senha;

    private $candidatoRepo;

    public function __construct(CandidatoRepository $candidatoRepo)
    {
        $this->candidatoRepo = $candidatoRepo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CandidatoUpdateFormRequest $request, $id)
    {
        $candidato = $this->candidatoRepo->findById($id);

        $this->alterarSenha($request, $candidato);

        $candidatoUpdate = $request->only(['nome', 'email']);
        $candidato->update($candidatoUpdate);

        if ($candidato) {
            return redirect()->back()->with('success', 'Suas informações foram atualizadas!');
        }
    }
}
