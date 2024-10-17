<?php

use App\Http\Controllers\Modulos\ApiAlertasController;
use Illuminate\Support\Facades\Route;


// GET
Route::get('/api/alertas/', [ApiAlertasController::class, 'index'])->name('api.alertas');
Route::get('/api/alertas/{id}', [ApiAlertasController::class, 'show'])->name('api.alertas.show');
Route::get('/api/alertas/status', [ApiAlertasController::class, 'getByStatus'])->name('api.alertas.status');

// POST
Route::post('/api/alertas', [ApiAlertasController::class, 'store'])->name('api.store.alertas');


// PUT
Route::put('/api/alertas/{id}', [ApiAlertasController::class, 'update'])->name('alertas.update');

// DELETE
Route::delete('/api/alertas/{id}', [ApiAlertasController::class, 'destroy'])->name('alertas.delete');
