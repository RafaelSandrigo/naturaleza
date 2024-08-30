<?php

use App\Http\Controllers\ApiProdutosController;
use Illuminate\Support\Facades\Route;

// GET
Route::get('/api/produtos', [ApiProdutosController::class, 'index'])->name('api.produtos');

// POST
Route::post('/api/produtos', [ApiProdutosController::class, 'store'])->name('api.store.produtos');


// PUT
Route::put('/api/produtos/{produto}', [ApiProdutosController::class, 'update'])->name('produtos.update');

// DELETE
Route::delete('/api/produtos/{produto}', [ApiProdutosController::class, 'destroy'])->name('produtos.delete');


?>