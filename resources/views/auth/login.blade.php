@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h4 class="text-center"><i class="fas fa-sign-in-alt"></i>&nbsp;Entrar na Área do candidato</h4>
        <form method="POST" action="{{ route('login') }}">

            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                <label for="cpf" class="control-label">CPF:</label>
                <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') }}" required autofocus>
                @if ($errors->has('cpf'))
                    <span class="help-block">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">Senha:</label>
                <input id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lembrar-me
                    </label>
                </div>
            </div>

            <div class="form-group">
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Esqueceu sua senha?
                </a>
                <a class="btn btn-link" href="{{ route('register') }}">
                    Não tem cadastro?
                </a>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-block btn-primary">
                    <i class="fas fa-sign-in-alt"></i>&nbsp; Entrar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
