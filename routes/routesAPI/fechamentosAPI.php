<?php

use App\Http\Controllers\ApiFechamentosController;
use Illuminate\Support\Facades\Route;


// GET
Route::get('/api/fechamentos', [ApiFechamentosController::class, 'index'])->name('api.fechamentos');

// POST
Route::post('/api/fechamentos', [ApiFechamentosController::class, 'store'])->name('api.store.fechamentos');


// PUT
Route::put('/api/fechamentos/{fechamentos}', [ApiFechamentosController::class, 'update'])->name('fechamentos.update');

// DELETE
Route::delete('/api/fechamentos/{fechamentos}', [ApiFechamentosController::class, 'destroy'])->name('fechamentos.delete');
