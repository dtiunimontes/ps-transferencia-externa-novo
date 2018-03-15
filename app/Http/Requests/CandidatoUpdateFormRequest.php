<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidatoUpdateFormRequest extends FormRequest
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
        $candidatoId = \Auth::user()->id;

        return [
            'nome' => 'required|min:3',
            'email' => 'required|email|unique:candidatos,email,' . $candidatoId . ',id',
            'password' => 'required_with:new_password,new_password_confirmation',
            'new_password' => 'confirmed|required_with:password,new_password_confirmation',
        ];
    }
}
