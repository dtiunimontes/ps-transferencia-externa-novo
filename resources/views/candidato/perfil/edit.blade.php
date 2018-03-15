@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <h4 class="text-center"><i class="fas fa-user"></i>&nbsp;Informações básicas</h4>

            <form method="POST" action="{{ route('candidato.update', $perfil->candidato->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                        <label for="nome" class="control-label">Nome completo: </label>
                        <input id="nome" type="text" class="form-control" name="nome" value="{{ $perfil->candidato->nome }}" required autofocus>
                        @if ($errors->has('nome'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nome') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-mail:</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ $perfil->candidato->email }}" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <small><strong>OBS:</strong> o cpf só poderá ser alterado mediante solicitação a CEPS</small>
                </div>

                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                        <label for="cpf" class="control-label">CPF:</label>
                        <input id="cpf" type="text" class="form-control" name="cpf" value="{{ $perfil->candidato->cpf }}" required disabled>
                        @if ($errors->has('cpf'))
                            <span class="help-block">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <br>
                    <small><strong>OBS:</strong> Para alterar a senha, basta preencher os campos abaixo. Se não deseja alterá-la, não preencha os campos</small>
                </div>

                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Senha atual: </label>
                        <input id="password" type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                        <label for="new_password" class="control-label">Nova senha: </label>
                        <input id="new_password" type="password" class="form-control" name="new_password">

                        @if ($errors->has('new_password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('new_password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="new-password-confirm" class="control-label">Confirme a senha:</label>
                        <input id="new-password-confirm" type="password" class="form-control" name="new_password_confirmation">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group text-right">
                        <br>
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fas fa-save"></i>&nbsp; Salvar alterações
                        </button>
                    </div>
                </div>
            </form>

            <hr>

            <h4 class="text-center"><i class="fas fa-user"></i>&nbsp;Perfil</h4>

            @php
                use App\Support\Traits\Datas;
                $dataNascimento = Datas::converterFormatoUSAParaBRSemBarras($perfil->data_nascimento);
            @endphp

            <form method="POST" action="{{ route('candidato.perfil.update', $perfil->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('data_nascimento') ? ' has-error' : '' }}">
                        <label for="data_nascimento" class="control-label">Data de nascimento: </label>
                        <input id="data_nascimento" type="text" class="form-control" name="data_nascimento" value="{{ $dataNascimento }}" required autofocus>
                        @if ($errors->has('data_nascimento'))
                            <span class="help-block">
                            <strong>{{ $errors->first('data_nascimento') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('rg') ? ' has-error' : '' }}">
                        <label for="rg" class="control-label">RG: </label>
                        <input id="rg" type="text" class="form-control" name="rg" value="{{ $perfil->rg }}" required autofocus>
                        @if ($errors->has('rg'))
                            <span class="help-block">
                                <strong>{{ $errors->first('rg') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('orgao_expeditor') ? ' has-error' : '' }}">
                        <label for="orgao_expeditor" class="control-label">Órgão expeditor: </label>
                        <input id="orgao_expeditor" type="text" class="form-control" name="orgao_expeditor" value="{{ $perfil->orgao_expeditor }}" required autofocus>
                        @if ($errors->has('orgao_expeditor'))
                            <span class="help-block">
                                <strong>{{ $errors->first('orgao_expeditor') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('telefone_celular') ? ' has-error' : '' }}">
                        <label for="telefone_celular" class="control-label">Telefone celular: </label>
                        <input id="telefone_celular" type="text" class="form-control telefone" name="telefone_celular" value="{{ $perfil->telefone_celular }}" required autofocus>
                        @if ($errors->has('telefone_celular'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefone_celular') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('telefone_fixo') ? ' has-error' : '' }}">
                        <label for="telefone_fixo" class="control-label">Telefone fixo: </label>
                        <input id="telefone_fixo" type="text" class="form-control telefone" name="telefone_fixo" value="{{ $perfil->telefone_fixo }}" required autofocus>
                        @if ($errors->has('telefone_fixo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefone_fixo') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
                        <label for="cep" class="control-label">CEP: </label>
                        <input id="cep" type="text" class="form-control" name="cep" value="{{ $perfil->cep }}" required autofocus>
                        @if ($errors->has('cep'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cep') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('logradouro') ? ' has-error' : '' }}">
                        <label for="logradouro" class="control-label">Logradouro: </label>
                        <input id="logradouro" type="text" class="form-control" name="logradouro" value="{{ $perfil->logradouro }}" required autofocus>
                        @if ($errors->has('logradouro'))
                            <span class="help-block">
                                <strong>{{ $errors->first('logradouro') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }}">
                        <label for="numero" class="control-label">Número: </label>
                        <input id="numero" type="text" class="form-control" name="numero" value="{{ $perfil->numero }}" required autofocus>
                        @if ($errors->has('numero'))
                            <span class="help-block">
                                <strong>{{ $errors->first('numero') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="complemento" class="control-label">Complemento: </label>
                        <input id="complemento" type="text" class="form-control" name="complemento" value="{{ $perfil->complemento }}" autofocus>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('cidade') ? ' has-error' : '' }}">
                        <label for="cidade" class="control-label">Cidade: </label>
                        <input id="cidade" type="text" class="form-control" name="cidade" value="{{ $perfil->cidade }}" required autofocus>
                        @if ($errors->has('cidade'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cidade') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
                        <label for="bairro" class="control-label">Bairro: </label>
                        <input id="bairro" type="text" class="form-control" name="bairro" value="{{ $perfil->bairro }}" required autofocus>
                        @if ($errors->has('bairro'))
                            <span class="help-block">
                                <strong>{{ $errors->first('bairro') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                        <label for="estado" class="control-label">Estado: </label>
                        <input id="estado" type="text" class="form-control" name="estado" value="{{ $perfil->estado }}" required autofocus>
                        @if ($errors->has('estado'))
                            <span class="help-block">
                                <strong>{{ $errors->first('estado') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group text-right">
                        <br>
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fas fa-save"></i>&nbsp; Salvar alterações
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
