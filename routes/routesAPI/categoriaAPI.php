<?php 
use App\Http\Controllers\ApiCategoriasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutosController;
use App\Models\Produtos;
use Illuminate\Support\Facades\Route;

// GET
Route::get('/api/categorias', [ApiCategoriasController::class, 'index'])->name('api.categorias');

// POST
Route::post('/api/categorias', [ApiCategoriasController::class, 'store'])->name('api.store.categorias');


// PUT
Route::put('/api/categorias/{categorias}', [ApiCategoriasController::class, 'update'])->name('categoria.update');

// DELETE
Route::delete('/api/categorias/{categorias}', [ApiCategoriasController::class, 'destroy'])->name('categoria.delete');


?>