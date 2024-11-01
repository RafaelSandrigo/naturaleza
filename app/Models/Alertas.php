<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Alertas extends Model
{
    use HasFactory;

    protected $fillable = [
        'texto_alerta',
        'status_alerta',
    ];

    public function getByStatus($status){
        $result = DB::table('alertas')
        ->select("*")
        ->where("status_alerta", "=", $status)
        ->first();

        return $result;
    }

}
