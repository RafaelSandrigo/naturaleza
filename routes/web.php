<?php

use App\Http\Controllers\ApiCategoriasController;
use App\Http\Controllers\CabecalhoController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutosController;
use App\Models\Produtos;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produtos', [ProdutosController::class, 'index'])->name('produtos');
Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias');
Route::get('/cabecalhos', [CabecalhoController::class, 'index'])->name('cabecalhos');
Route::get('/cabecalhos/{cabecalho}', [CabecalhoController::class, 'show'])->name('cabecalho.show');


Route::post('/produtos', [ProdutosController::class, 'store'])->name('produtos.store');


Route::put('/produtos/{produto}', [ProdutosController::class, 'update'])->name('produtos.update');
Route::put('/cabecalhos/{cabecalho}', [CabecalhoController::class, 'update'])->name('cabecalhos.update');

Route::delete('/produtos/{produto}', [ProdutosController::class, 'destroy'])->name('produtos.delete');

// API 
require_once dirname(__FILE__) . '/routesAPI/categoriaAPI.php';
require_once dirname(__FILE__) . '/routesAPI/itensAPI.php';
require_once dirname(__FILE__) . '/routesAPI/cabecalhoAPI.php';
require_once dirname(__FILE__) . '/routesAPI/produtosAPI.php';



Route::fallback(function(){
    return view('');
});

