<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduto;
use App\Http\Requests\UpdateProduto;
use App\Models\Categorias;
use App\Models\Produtos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProdutosController extends Controller
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

        $categorias = (new Categorias)->listaCategorias();
        
        return view('produtos', ['title' => 'Produtos', 'produtos' => $produtos, 'categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduto $request)
    {
        $validatedData = $request->validated();

        try {
            $saved = (new Produtos())->insert($validatedData);

            return response()->json(["success" => $saved, "message" => 'Produto cadsatrado com sucesso']);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage(), "message" => 'Erro ao cadastrar produto'], 502);
        }

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function edit(Produtos $produtos)
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
    public function update(UpdateProduto $request, Produtos $produto)
    {  
        $validatedData = $request->validated();

        try {
            $update = $produto->update($validatedData);
            if(!$update){
                throw new Exception('Falha ao atualizar a categoria');
            }
            return response()->json(['success'=> 'true', 'message' => 'Produto atualizado com sucesso', 'data' => $validatedData], 200);
        } catch (Exception $e) {
            // Salvar log
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
    public function destroy(Produtos $produto)
    {
        try{
            $produto->delete();
            return response()->json(['message' => "Produto deletado com sucesso"], 200);
        }catch(Exception $e){
            return response()->json(['message' => "Não foi possivle deletar o produto"], 200);
        }
    }

    public function debug(Request $request, Produtos $produto){
        return response()->json(['message' => $request->all()], 200);
    }

}
