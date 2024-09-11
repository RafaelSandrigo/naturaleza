<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCabecalho extends FormRequest
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
            // 'nome_cabecalho' => 'required|string|max:50',
            // 'horario_pedido' => 'required|date_format:H:i',
            // 'dia_pedido' => 'required|date_format:Y-m-d',
            // 'inic_horas_entrega' => 'required|date_format:H:i',
            // 'fim_horas_entrega' => 'required|date_format:H:i|after:inic_horas_entrega',
            // 'dia_entrega' => 'required|date_format:Y-m-d|after_or_equal:dia_pedido',
            // 'texto_cabecalho' => 'nullable|string|max:1000',
            // 'status_cabecalho' => 'required|string|in:s,n',
        ];
    }
    

    
}
