<?php

namespace App\Http\Controllers\Candidato;

use App\Http\Requests\PerfilCandidatoUpdateFormRequest;
use App\Support\Repositories\CandidatoRepository;
use App\Support\Repositories\PerfilCandidatoRepository;
use App\Support\Traits\Datas;
use App\Support\Traits\Senha;
use App\Http\Controllers\Controller;

class PerfilController extends Controller
{
    use Senha, Datas;

    private $perfilCandidatoRepo;

    /**
     * PerfilController constructor.
     * @param PerfilCandidatoRepositoryInterface $perfilCandidatoRepository
     */
    public function __construct(PerfilCandidatoRepository $perfilCandidatoRepo)
    {
        $this->perfilCandidatoRepo = $perfilCandidatoRepo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfil = $this->perfilCandidatoRepo->findByCandidatoId($id);

        return view('candidato.perfil.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerfilCandidatoUpdateFormRequest $request, $id)
    {
        $perfil = $this->perfilCandidatoRepo->findById($id);

        $perfilCandidatoUpdate = $request->all();

        $dataConvertida = $this->converterParaFormatoUSA($request->input('data_nascimento'));
        $perfilCandidatoUpdate['data_nascimento'] = $dataConvertida;

        $perfil->update($perfilCandidatoUpdate);

        return redirect()->back()->with('success', 'Perfil atualizado! :)');
    }
}
