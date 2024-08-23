<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Categorias extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'nome_categoria',
        'status_categoria',
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


    public function nomePorId(Produtos $produto)
    {
        return DB::table('categorias')
            ->select('nome_categoria')
            ->where('id', '=', $produto->id)
            ->first();
    }


    public function listaCategorias($campo = "nome_categoria",$ordem = 'asc')
    {
        return DB::table('categorias')
        ->orderBy($campo, $ordem)
        ->get();
    }

    public function listaCategoriasAtivas()
    {
        return DB::table('categorias')
        ->select()
        ->where('status_categoria', '=', 's')
        ->get()
        ->toArray();
        // $results = DB::table('categorias')
        // ->select()
        // ->where('status_categoria', '=', 's')
        // ->get()
        // ->toArray();
        // $resultsArray = json_decode(json_encode($results), true);

        // return $resultsArray;
    }
}
