<?php

namespace App\Http\Controllers\Candidato;

use App\Http\Controllers\Controller;
use App\Support\Repositories\InscricaoRepository;
use App\Support\Repositories\ProcessoSeletivoRepository;

class HomeController extends Controller
{
    private $processoSeletivoRepo;
    private $inscricaoRepo;

    public function __construct(
        ProcessoSeletivoRepository $processoSeletivoRepo,
        InscricaoRepository $inscricaoRepo
    )
    {
        $this->processoSeletivoRepo = $processoSeletivoRepo;
        $this->inscricaoRepo = $inscricaoRepo;
    }

    public function index()
    {
        $processoSeletivoAtual = $this->processoSeletivoRepo->getUltimoAtivo();
        $candidatoLogadoId = auth()->user()->id;

        $this->setarProcessoSeletivoAtual($processoSeletivoAtual);
        $candidatoInscritoProcessoAtual = $this->verificarSeCandidatoLogadoEstaInscritoNoProcessoAtual($processoSeletivoAtual);

        $infoInscricaoProcessoSeletivoAtual = [];

        if ($candidatoInscritoProcessoAtual) {
            $infoInscricaoProcessoSeletivoAtual = $this->inscricaoRepo->getInfoInscricao($candidatoLogadoId, $processoSeletivoAtual->id);
        }

        return view('candidato.home', [
            'processoSeletivoAtual' => $processoSeletivoAtual,
            'candidatoInscritoProcessoAtual' => $candidatoInscritoProcessoAtual,
            'info' => $infoInscricaoProcessoSeletivoAtual,
        ]);
    }

    private function setarProcessoSeletivoAtual($processoSeletivoAtual)
    {
        if ( ! session()->exists('processoSeletivoAtivo')) {
            session(['processoSeletivoAtivo' => $processoSeletivoAtual->titulo]);
            session(['processoSeletivoAtivoId' => $processoSeletivoAtual->id]);
        }
    }

    private function verificarSeCandidatoLogadoEstaInscritoNoProcessoAtual($processoSeletivoAtual)
    {
        $inscricoes = auth()->user()->inscricoes->toArray();

        foreach ($inscricoes as $inscricao) {
            if (array_get($inscricao, 'processo_seletivo_id') == $processoSeletivoAtual->id) {
                return true;
            }
        }

        return false;
    }
}
