<?php 
use App\Http\Controllers\ApiCabecalhoController;
use Illuminate\Support\Facades\Route;

// GET
Route::get('/api/cabecalhos', [ApiCabecalhoController::class, 'index'])->name('api.cabecalho.index');

// POST
Route::post('/api/cabecalhos', [ApiCabecalhoController::class, 'store'])->name('api.cabecalho.store');


// PUT
Route::put('/api/cabecalhos/{cabecalho}', [ApiCabecalhoController::class, 'update'])->name('api.cabecalho.update');

// DELETE
Route::delete('/api/cabecalhos/{cabecalho}', [ApiCabecalhoController::class, 'destroy'])->name('api.cabecalho.destroy');


