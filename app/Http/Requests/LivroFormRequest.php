<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroFormRequest extends FormRequest
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
        return [
            'nome'        => 'required',
            'categoria'   => 'required',
            'codigo'      => 'required',
            'autor'       => 'required',
        ];
    }

    public function messages(){
        return [
            'nome.required'         => 'O campo nome é obrigatório',
            'categoria.required'    => 'O campo categoria é obrigatório',
            'codigo.required'       => 'O campo codigo é obrigatório',
            'autor.required'        => 'O campo autor é obrigatório',
        ];
    }
}
