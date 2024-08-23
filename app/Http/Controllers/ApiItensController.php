<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Produtos;
use Exception;
use Illuminate\Http\Request;

class ApiItensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $listaProdutos = $this->produtosDasCategorias();
            
            if(empty($listaProdutos)){
                $listaProdutos = 'Nenhum produto ou categoria ativa';
            }
            return response()->json(['success' => "true",'data' =>$listaProdutos],200);
        } catch (Exception $e) {
            return response()->json(['success' => 'false','error' => $e->getMessage()]);
        }

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
    * Realiza uma busca dos produtos pelas categorias, retornando um array com as categorias como nome do indice e os produtos dentro do array
    * @return array
    */
    public function produtosDasCategorias(){
        $categorias = (new Categorias)->listaCategoriasAtivas();
        $listaProdutos = [];
        foreach ($categorias as $categoria){
            $produtos = (array) ((new Produtos)->produtosPorCategoria($categoria->id));
            $resultProdutos =[];
            foreach ($produtos as $produto) {
                $resultProdutos[$produto['nome_produto']] = $produto;
            }
            if(!empty($produtos[0])){
                $listaProdutos[$categoria->nome_categoria] = $resultProdutos;
            }
        }
        // dd(var_dump($listaProdutos));
        
        return $listaProdutos;
    }

}