<?php

namespace App\Http\Requests;

use DateTime;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RequestCabecalho extends FormRequest
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
            //
        ];
    }
    /**
     * Valida se todos os campos foram informado
     *
     * @return boolean
     */
    public function validarRequired(){
        $fields = [
            'nome_cabecalho',
            'horario_pedido',
            'dia_pedido',
            'inic_horas_entrega',
            'fim_horas_entrega',
            'dia_entrega',
            'status_cabecalho',
        ];
        foreach($fields as $field){
            if (!$this->filled($field)) {
                return false;
            } 
        }
        return true;
    }

    public function validarFormatoDados(){
        try {
            // dd($this->dia_pedido);
            $this->merge([
                'horario_pedido' => DateTime::createFromFormat('H:i', $this->horario_pedido)?->format('H:i'),
                'inic_horas_entrega' => DateTime::createFromFormat('H:i', $this->inic_horas_entrega)?->format('H:i'),
                'fim_horas_entrega' => DateTime::createFromFormat('H:i', $this->fim_horas_entrega)?->format('H:i'),
            ]);
            
            if(isset($this->horario_pedido)){

            }
            if(isset($this->fim_horas_entrega)){

            }
            if(isset($this->fim_horas_entrega)){

            }
            $validated = Validator::make($this->all(), [
                'nome_cabecalho' => 'string|max:50',
                'horario_pedido' => 'date_format:H:i',
                'dia_pedido' => 'string|max:50',
                'inic_horas_entrega' => 'date_format:H:i',
                'fim_horas_entrega' => 'date_format:H:i|after:inic_horas_entrega',
                'dia_entrega' => 'string|max:50',
                'texto_cabecalho' => 'string|max:1000',
                'status_cabecalho' => 'in:s,n|string',
            ])->validate();         
        } catch (ValidationException $e) {
            dd($e->errors());
            return false;
        }
        return $validated;

    }
}
