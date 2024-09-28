<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCategoria;
use App\Models\Categorias;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiCategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $categorias = (new Categorias())->listaCategorias();
            return response()->json(["categorias" => $categorias, 'message' => 'Sucesso'], 200);
            } catch(Exception $e){
                response()->json(['Error' => $e->getMessage()],502);
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateCategoria $request)
    {
        $validatedData = $request->validated();
        $validatedData["nome_categoria"] = strtoupper($validatedData["nome_categoria"]);

        try {
            if(empty($validatedData)){
                throw new Exception();
            }
            $saved = (new Categorias)->insert($validatedData);

            return response()->json(["success" => $saved, "message" => 'Categoria cadsatrado com sucesso']);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage(), "message" => 'Erro ao cadastrar Categoria'], 502);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoria $request, $id)
    {
        try {
            $categoria = Categorias::findOrFail($id);
        } catch (Exception $e) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        $validatedData = $request->validated();

        try {
            $update = $categoria->update($validatedData);
            if(!$update){
                throw new Exception('Falha ao atualizar a categoria');
            }
            return response()->json(['success'=> $update, 'message' => 'Categoria atualizada com sucesso', 'data' => $validatedData], 200);
        } catch (Exception $e) {
            Log::warning('Categoria não editada', ['error' => $e->getMessage(), 'data' => $validatedData]);
            return response()->json(['error' => $e->getMessage()], 502);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $categoria = Categorias::findOrFail($id);
        } catch (Exception $e) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        try {
            $result = $categoria->delete();

            if ($result) {
                return response()->json(['message' => "Categoria deletada com sucesso"], 200);
            } else {
                return response()->json(['message' => "Categoria nao encontrada"], 404);
            }
        } catch (Exception $e) {
            // Opcional: Registrar o erro para depuração
            Log::error('Erro ao deletar categoria: ' . $e->getMessage());
    
            return response()->json(['message' => "Não foi possível deletar a categoria"], 500);
        }
    }
    
}
