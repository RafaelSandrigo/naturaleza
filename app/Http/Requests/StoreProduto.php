<?php

namespace App\Http\Requests;

use App\Rules\ValidaCategoria;
use Illuminate\Foundation\Http\FormRequest;

class StoreProduto extends FormRequest
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
            'nome_produto' => 'required|max:50|string',
            'medida_produto' => 'required|string|max:50',
            'preco_produto' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'id_categoria' => ['required','integer', new ValidaCategoria],
            'status_produto' => 'required|in:s,n|string',
        ];
    }
}
