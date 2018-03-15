<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\Repositories\ProcessoSeletivoRepository;
use App\Support\Traits\Sessao;

class HomeController extends Controller
{
    use Sessao;

    private $processoSeletivoRepo;

    public function __construct(ProcessoSeletivoRepository $processoSeletivoRepo)
    {
        $this->middleware('auth:admin');
        $this->processoSeletivoRepo = $processoSeletivoRepo;
    }

    public function index()
    {
        if ( ! session()->exists('processoSeletivoAtivo')) {
            $processoSeletivo = $this->processoSeletivoRepo->getUltimoAtivo();
            session(['processoSeletivoAtivo' => $processoSeletivo->titulo]);
        }

        return view('admin.home');
    }
}
