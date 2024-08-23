<?php

namespace App\Http\Requests;

use App\Rules\ValidaCategoria;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class UpdateProduto extends FormRequest
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
            'nome_produto' => 'max:50|string',
            'medida_produto' => 'string|max:50',
            'preco_produto' => 'numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'id_categoria' => ['integer', new ValidaCategoria],
            'status_produto' => 'in:s,n|string',
        ];
    }   
}
