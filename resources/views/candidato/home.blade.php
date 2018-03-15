@extends('layouts.app')

@section('content')

    <div class="page-header">
        <h2>Processo Seletivo atual</h2>
    </div>

    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="card-t card-t-green">
                <div class="content-card-t text-center">
                    <h2><b>{{ $processoSeletivoAtual->titulo }}</b></h2>
                    @if ( ! $candidatoInscritoProcessoAtual)
                        <strong>
                            <a href="{{ route('candidato.inscricao.processo_seletivo.form') }}" class="btn btn-inscricao">
                                <i class="fa fa-pencil-alt"></i>&nbsp;Realizar inscrição
                            </a>
                        </strong>
                    @else
                        <strong><i class="fa fa-check"></i>&nbsp;Você já está inscrito</strong>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>
    @if ($candidatoInscritoProcessoAtual)
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4><strong><i class="fa fa-info-circle"></i>&nbsp;Informações de sua inscrição</strong></h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr class="success">
                                <th class="text-center">Núm. Inscrição</th>
                                <th class="text-center">Cod. Trans.</th>
                                <th class="text-center">Curso</th>
                                <th class="text-center">Campi</th>
                                <th class="text-center">Processo Seletivo</th>
                                <th class="text-center">Vagas</th>
                                <th class="text-center">Turno</th>
                                <th class="text-center">Período</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr align="center" class="active">
                                <td>{{ $info['inscricao']->id }}</td>
                                <td>{{ $info['inscricao']->transferencia->id }}</td>
                                <td>{{ $info['curso']->nome }}</td>
                                <td>{{ $info['campi']->nome }}</td>
                                <td>{{ session()->get('processoSeletivoAtivo') }}</td>
                                <td>{{ $info['inscricao']->transferencia->vagas }} vagas</td>
                                <td>{{ $info['inscricao']->transferencia->turno }}</td>
                                <td>{{ $info['inscricao']->transferencia->periodo }}º</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="page-header">
        <h2>Processos que você já participou <small> | já encerrados</small></h2>
    </div>

    <div class="row">
        @php
            $inscricoes = auth()->user()->inscricoes->filter(function ($value, $key) {
                return $value->processo_seletivo_id != session()->get('processoSeletivoAtivoId');
            });
        @endphp

        @forelse($inscricoes as $inscricao)
            <div class="col-sm-2">
                <div class="card-t card-t-red">
                    <div class="content-card-t text-center">
                        <h2><b>{{ $inscricao->processoSeletivo->titulo }}</b></h2>
                    </div>
                </div>
            </div>
        @empty
            <small>Você ainda não participou de nenhum processo!</small>
        @endforelse
    </div>

@endsection
