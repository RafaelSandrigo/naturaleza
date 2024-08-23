<?php 
use App\Http\Controllers\ApiCategoriasController;
use App\Http\Controllers\ApiItensController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutosController;
use App\Models\Produtos;
use Illuminate\Support\Facades\Route;

// GET
Route::get('/api/itens', [ApiItensController::class, 'index'])->name('api.itens');


?>