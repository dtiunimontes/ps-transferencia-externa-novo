<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilCandidatoUpdateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $perfilCandidatoId = \Auth::user()->perfil->id;

        return [
            'rg' => 'required|string|max:20|unique:perfis_candidatos,rg, ' . $perfilCandidatoId . ',id',
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
        ];
    }
}
