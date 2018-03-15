@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h4 class="text-center"><i class="fas fa-key"></i>&nbsp;Recuperar senha</h4>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-mail:</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Digite o email que você cadastrou...">
                    @if ($errors->has('email'))
                        <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="form-group text-right">
                    <a href="{{ route('login') }}" class="btn btn-warning">
                        <i class="fas fa-chevron-circle-left"></i>&nbsp;Voltar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-external-link-alt"></i>&nbsp;Enviar link de recuperação
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
