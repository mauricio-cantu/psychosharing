<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MaterialRequest extends FormRequest
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
            'descricao'=>'required',
            'link'=>'url|nullable',
            'anexo'=>'file|nullable'
        ];
    }

    public function messages()
    {
        return [
            'required'=>':attribute',            
            'url'=>'Por favor, insira um endereço válido.'
        ];
    }

    public function attributes()
    {
        return [
            'titulo'=>'Título',
            'descricao'=>'Descrição'
        ];
    }
}
