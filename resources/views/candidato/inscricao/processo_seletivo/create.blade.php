@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center">
                <i class="fa fa-pencil-alt"></i>&nbsp;Realizar Inscrição no Processo de Transferência Externa {{ session()->get('processoSeletivoAtivo') }}
            </h4>
            <br>
            <form action="{{ route('candidato.inscricao.processo_seletivo.submit') }}" method="POST">
                {{ csrf_field() }}
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="transferencia_id">Código da transferência: </label>&nbsp;&nbsp;<small>(Disponível no edital)</small>
                        <select name="transferencia_id" id="transferencia_id" class="form-control">
                            @foreach($transferenciasProcessoAtual as $transferencia)
                                <option value="{{ $transferencia->id }}">{{ $transferencia->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('candidato.home') }}" class="btn btn-warning"><i class="fa fa-chevron-circle-left"></i>&nbsp;Voltar</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-alt"></i>&nbsp;Realizar inscrição</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection