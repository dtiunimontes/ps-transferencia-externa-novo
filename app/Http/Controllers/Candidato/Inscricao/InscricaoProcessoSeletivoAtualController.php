<?php

namespace App\Http\Controllers\Candidato\Inscricao;

use App\Support\Repositories\CandidatoRepository;
use App\Support\Repositories\InscricaoRepository;
use App\Support\Repositories\TransferenciaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InscricaoProcessoSeletivoAtualController extends Controller
{
    private $transferenciaRepo;
    private $inscricaoRepo;
    private $candidatoRepo;

    public function __construct(
        TransferenciaRepository $transferenciaRepository,
        InscricaoRepository $inscricaoRepository,
        CandidatoRepository $candidatoRepository
    )
    {
        $this->transferenciaRepo = $transferenciaRepository;
        $this->inscricaoRepo = $inscricaoRepository;
        $this->candidatoRepo = $candidatoRepository;
    }

    /**
     * Carrega a view de inscrição na transferência do Processo Seletivo Atual
     *
     * @return \Illuminate\Http\Response
     */
    public function showFormInscricao()
    {
        $processoSeletivoAtualId = session()->get('processoSeletivoAtivoId');
        $transferenciasProcessoAtual = $this->transferenciaRepo->getByProcessoSeletivo($processoSeletivoAtualId);

        return view('candidato.inscricao.processo_seletivo.create', compact('transferenciasProcessoAtual'));
    }

    /**
     * Inscreve um candidato em uma transferência do processo Seletivo Atual
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inscreverCandidato(Request $request)
    {

        $processoSeletivoAtualId = session()->get('processoSeletivoAtivoId');
        $processoSeletivoAtualTitulo = session()->get('processoSeletivoAtivo');
    
        if ($this->verificarExistenciaInscricao(auth()->user()->id, $processoSeletivoAtualId)) {
            return redirect()
                ->back()
                ->with('error', 'Só é possível realizar uma inscrição por processo!');
        }
        $candidato = $this->candidatoRepo->findById(auth()->user()->id);
        $transferenciaId = $request->input('transferencia_id');
        //fazer inscrição do candidato
        $this->inscricaoRepo->inscreverCandidato($candidato, (int) $transferenciaId, (int) $processoSeletivoAtualId);
        
        return redirect()
            ->route('candidato.home')
            ->with('success',"Sua inscrição no processo seletivo da Transferência Externa - {$processoSeletivoAtualTitulo} foi realizada com sucesso!");
    }

    /**
     * Verifica se um candidato está inscrito no processo seletivo atual
     *
     * @param $candidatoId
     * @param $processoSeletivoAtualId
     * @return bool
     */
    private function verificarExistenciaInscricao($candidatoId, $processoSeletivoAtualId) {
        return $this->inscricaoRepo->countQuantidadeInscricoesProcessoAtual($candidatoId, $processoSeletivoAtualId) === 1;
    }
}
