<?php

namespace App\Http\Requests;

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
            'nome_cabecalho' => 'string|max:50',
            'horario_pedido' => 'date_format:H:i',
            'dia_pedido' => 'date',
            'inic_horas_entrega' => 'date_format:Y/m/d',
            'fim_horas_entrega' => 'date_format:Y/m/d|after:inic_horas_entrega',
            'dia_entrega' => 'date_format:Y/m/d',            
        ];
    }
}
