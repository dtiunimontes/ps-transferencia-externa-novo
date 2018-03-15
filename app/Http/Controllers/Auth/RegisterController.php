<?php

namespace App\Http\Controllers\Auth;

use App\Models\Candidato;
use App\Http\Controllers\Controller;
use App\Models\PerfilCandidato;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/candidato';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:candidatos',
            'cpf' => 'required|min:11|max:11|unique:candidatos|cpf',
            'password' => 'required|string|min:6|confirmed',
            'rg' => 'required|string|max:20|unique:perfis_candidatos',
            'orgao_expeditor' => 'required|string|max:20',
            'data_nascimento' => 'required',
            'telefone_celular' => 'required|string|max:20',
            'telefone_fixo' => 'string|max:20',
            'cep' => 'required|max:8',
            'logradouro' => 'required|string|max:80',
            'numero' => 'required|string',
            'cidade' => 'required|string|max:100',
            'bairro' => 'required|string|max:100',
            'estado' => 'required|string|max:2',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Candidato
     */
    protected function create(array $data)
    {
        list($dia, $mes, $ano) = explode('/', $data['data_nascimento']);

        $candidato = Candidato::create([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'cpf' => $data['cpf'],
            'password' => bcrypt($data['password']),
        ]);

        $perfil = PerfilCandidato::create([
            'candidato_id' => $candidato->id,
            'rg' => $data['rg'],
            'orgao_expeditor' => $data['orgao_expeditor'],
            'data_nascimento' => $ano.'-'.$mes.'-'.$dia,
            'telefone_celular' => $data['telefone_celular'],
            'telefone_fixo' => $data['telefone_fixo'],
            'cep' => $data['cep'],
            'logradouro' => $data['logradouro'],
            'numero' => $data['numero'],
            'complemento' => $data['complemento'],
            'cidade' => $data['cidade'],
            'bairro' => $data['bairro'],
            'estado' => $data['estado'],
        ]);

        if ($candidato and $perfil) {
            session()->flash('success', 'Seja bem-vind(o/a), seu cadastro foi realizado com sucesso. Agora basta se inscrever no processo seletivo desejado!');
        }

        return $candidato;
    }
}
