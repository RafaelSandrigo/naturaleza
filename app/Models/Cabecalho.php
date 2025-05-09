<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Cabecalho extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $fillable = [
        'nome_cabecalho',
        'horas_pedidos',
        'dia_pedido',
        'inic_horas_entrega',
        'fim_horas_entrega',
        'dia_entrega',
        'texto_cabecalho',
        'status_cabecalho',       
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Formata o campo de horario
     *
     * @param [type] $value
     * @return void
     */
    // Formatar o campo de horario
    public function formatTime($value)
    {
        return \Carbon\Carbon::createFromFormat('H:i:s', $value)->format('H:i');
    }

    public function buscaByStatus($status){
        $result = DB::table('cabecalhos')
        ->select("*")
        ->where("status_cabecalho", "=", $status)
        ->first();

        return $result;
    }

}
