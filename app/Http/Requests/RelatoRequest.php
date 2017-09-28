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
            'required'=>'Por favor, preencha o campo :attribute.'
        ];
    }

    public function attributes()
    {
        return [
            'titulo'=>'título',
            'linha_terapeutica'=>'linha terapêutica'
        ];
    }
}
