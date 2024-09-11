<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Produtos extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'nome_produto',
        'medida_produto',
        'preco_produto',
        'id_categoria',
        'status_produto',
        
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

    public function listaProdutos($campo = "nome_produto",$ordem = 'asc'){
        return DB::table('produtos')
        ->orderBy($campo, $ordem)
        ->get();
    }
    
    public function produtosPorCategoria($idCategoria) {
        $results = DB::table('produtos')
        ->select('id','nome_produto','medida_produto', 'preco_produto', 'id_categoria')
        ->where('id_categoria', '=', $idCategoria)
        ->where('status_produto', '=', 's')
        ->get()
        ->toArray();
        $resultsArray = json_decode(json_encode($results), true);

        return $resultsArray;
    }
}
