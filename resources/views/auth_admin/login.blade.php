@extends('layouts.app-admin')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h4 class="text-center"><i class="fas fa-unlock-alt"></i>&nbsp;Entrar na área Administrativa</h4>
        <form method="POST" action="{{ route('admin.login.submit') }}">

            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">E-mail:</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
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
                <button type="submit" class="btn btn-sm btn-block btn-success">
                    <i class="fas fa-sign-in-alt"></i>&nbsp; Entrar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
