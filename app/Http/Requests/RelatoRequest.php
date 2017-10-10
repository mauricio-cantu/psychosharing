<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RelatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo'=>'required',
            'conteudo'=>'required',
            'linha_terapeutica'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'required'=>':attribute'
        ];
    }

    public function attributes()
    {
        return [
            'titulo'=>'Título',
            'linha_terapeutica'=>'Linha terapêutica',
            'conteudo'=>'Relato'
        ];
    }
}
