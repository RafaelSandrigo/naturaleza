
<?php

use App\Http\Controllers\Modulos\ApiFechamentosController;
use Illuminate\Support\Facades\Route;


// GET
Route::get('/api/fechamentos/', [ApiFechamentosController::class, 'index'])->name('api.fechamentos');
Route::get('/api/fechamentos/status', [ApiFechamentosController::class, 'getByStatus'])->name('api.fechamentos.status');
Route::get('/api/fechamentos/{id}', [ApiFechamentosController::class, 'index'])->name('api.fechamentos');

// POST
Route::post('/api/fechamentos', [ApiFechamentosController::class, 'store'])->name('api.store.fechamentos');


// PUT
Route::put('/api/fechamentos/{id}', [ApiFechamentosController::class, 'update'])->name('fechamentos.update');

// DELETE
Route::delete('/api/fechamentos/{id}', [ApiFechamentosController::class, 'destroy'])->name('fechamentos.delete');
