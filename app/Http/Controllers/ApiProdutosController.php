<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProduto;
use App\Models\Categorias;
use App\Models\Produtos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produtos::all();
        $produtos = (new Produtos)->listaProdutos();
        
        return response()->json(['success' => 'true', 'data' => $produtos],200);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function show(Produtos $produtos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduto $request, $id)
    {  
        try {
            $produto = Produtos::findOrFail($id);
        } catch (Exception $e) {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }

        $validatedData = $request->validated();
        try {
            $update = $produto->update($validatedData);
            if(!$update){
                throw new Exception('Falha ao atualizar a produto');
            }
            return response()->json(['success'=> 'true', 'message' => 'Produto atualizado com sucesso', 'data' => $validatedData], 200);
        } catch (Exception $e) {
            Log::warning('Conta não editada', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 502);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produtos $produtos)
    {
        //
    }
}
