<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ExercicioRequest extends FormRequest
{

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
            'descricao'=>'required',
            'linha_terapeutica'=>'required'
        ];
    }

    // Mensagens de erro
    public function messages()
    {
        return [
            'required'=>':attribute.'
        ];
    }

    // Customizar o nome dos campos nas mensagens de erros
    public function attributes()
    {
        return [
            'titulo'=>'Título',
            'descricao'=>'Descrição',
            'linha_terapeutica'=>'Linha terapêutica',
        ];
    }
}
