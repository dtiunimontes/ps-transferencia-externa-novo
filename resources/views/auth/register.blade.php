@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">

        <h4 class="text-center"><i class="fas fa-pencil-alt"></i>&nbsp;Realizar cadastro</h4>

        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="nome" class="control-label">Nome completo: </label>
                        <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" required autofocus>
                        @if ($errors->has('nome'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nome') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="email" class="control-label">E-mail:</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="cpf" class="control-label">CPF: </label>
                        <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') }}" required autofocus>
                        @if ($errors->has('cpf'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('cpf') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group{{ $errors->has('data_nascimento') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="data_nascimento" class="control-label">Data de nascimento: </label>
                        <input id="data_nascimento" type="text" class="form-control" name="data_nascimento" value="{{ old('data_nascimento') }}" required autofocus>
                        @if ($errors->has('data_nascimento'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('data_nascimento') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('rg') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="rg" class="control-label">RG: </label>
                        <input id="rg" type="text" class="form-control" name="rg" value="{{ old('rg') }}" required autofocus>
                        @if ($errors->has('rg'))
                            <span class="help-block">
                                <strong>{{ $errors->first('rg') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group{{ $errors->has('orgao_expeditor') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="orgao_expeditor" class="control-label">Órgão expeditor: </label>
                        <input id="orgao_expeditor" type="text" class="form-control" name="orgao_expeditor" value="{{ old('orgao_expeditor') }}" required autofocus>
                        @if ($errors->has('orgao_expeditor'))
                            <span class="help-block">
                                <strong>{{ $errors->first('orgao_expeditor') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group{{ $errors->has('telefone_celular') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="telefone_celular" class="control-label">Telefone celular: </label>
                        <input id="telefone_celular" type="text" class="form-control telefone" name="telefone_celular" value="{{ old('telefone_celular') }}" required autofocus>
                        @if ($errors->has('telefone_celular'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefone_celular') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group{{ $errors->has('telefone_fixo') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="telefone_fixo" class="control-label">Telefone fixo: </label>
                        <input id="telefone_fixo" type="text" class="form-control telefone" name="telefone_fixo" value="{{ old('telefone_fixo') }}" required autofocus>
                        @if ($errors->has('telefone_fixo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefone_fixo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="cep" class="control-label">CEP: </label>
                        <input id="cep" type="text" class="form-control" name="cep" value="{{ old('cep') }}" required autofocus>
                        @if ($errors->has('cep'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cep') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group{{ $errors->has('logradouro') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="logradouro" class="control-label">Logradouro: </label>
                        <input id="logradouro" type="text" class="form-control" name="logradouro" value="{{ old('logradouro') }}" required autofocus>
                        @if ($errors->has('logradouro'))
                            <span class="help-block">
                                <strong>{{ $errors->first('logradouro') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="numero" class="control-label">Número: </label>
                        <input id="numero" type="text" class="form-control" name="numero" value="{{ old('numero') }}" required autofocus>
                        @if ($errors->has('numero'))
                            <span class="help-block">
                                <strong>{{ $errors->first('numero') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="complemento" class="control-label">Complemento: </label>
                        <input id="complemento" type="text" class="form-control" name="complemento" value="{{ old('complemento') }}" autofocus>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('cidade') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="cidade" class="control-label">Cidade: </label>
                        <input id="cidade" type="text" class="form-control" name="cidade" value="{{ old('cidade') }}" required autofocus>
                        @if ($errors->has('cidade'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cidade') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="bairro" class="control-label">Bairro: </label>
                        <input id="bairro" type="text" class="form-control" name="bairro" value="{{ old('bairro') }}" required autofocus>
                        @if ($errors->has('bairro'))
                            <span class="help-block">
                                <strong>{{ $errors->first('bairro') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="estado" class="control-label">Estado: </label>
                        <input id="estado" type="text" class="form-control" name="estado" value="{{ old('estado') }}" required autofocus>
                        @if ($errors->has('estado'))
                            <span class="help-block">
                                <strong>{{ $errors->first('estado') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <label for="password" class="control-label">Senha: </label>
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="password-confirm" class="control-label">Confirme a senha:</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group text-right">
                    <div class="col-md-12">
                        <br>
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fas fa-pencil-alt"></i>&nbsp; Cadastrar
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
