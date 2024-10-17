<?php

namespace App\Http\Controllers\Modulos;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestFechamentos;
use App\Models\Alertas;
use App\Models\Fechamentos;
use Exception;
use Illuminate\Http\Request;

class ApiFechamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $fechamentos = (new Fechamentos)->all();
            return response()->json(['success'=>True, 'data'=>$fechamentos],200);
        } catch (Exception $e) {
            return response()->json(["success"=>false, "error"=> $e->getMessage()], 502);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestFechamentos $request)
    {
        try {
            
            $validatedData = $request->validated();
            $saved = (new Fechamentos())->insert($validatedData);
            if($saved){
                return response()->json(["success"=>True,"message"=>"Fechamento Cadastrado com sucesso"],200);
            }
        } catch (Exception $e) {
            return response()->json(["success"=>false, "error"=>"Erro ao criar o Fechamento"],502);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fechamentos  $fechamentos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $fechamento = Fechamentos::findOrFail($id);
        } catch (Exception $e) {
            return response()->json(['message' => 'Alerta não encontrado'], 404);
        }
        try{
            return response()->json(["success"=>True, "data" => $fechamento],200);
        }catch(Exception $e){
            return response()->json(["success"=>false, "error"=>"Erro ao encontrar o 'Fechamento'"]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fechamentos  $fechamentos
     * @return \Illuminate\Http\Response
     */
    public function update(RequestFechamentos $request, $id)
    {
        try {
            $fechamento = Alertas::findOrFail($id);
        } catch (Exception $e) {
            return response()->json(['message' => 'Alertas não encontrado'], 404);
        }
        try {
            $validatedData = $request->validated();
            $update = $fechamento->update($validatedData);
            
            if(!$update){
                throw new Exception("Não foi possível atualizar o 'Fechamento'");
            }
            return response()->json(["success" => True, "message" => "Atualização realizada com sucesso"],200);

        } catch (Exception $e) {
            return response()->json(["success"=>False, "error"=> "Erro ao atualizar o 'Fechamento'"],502);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fechamentos  $fechamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $fechamento = Fechamentos::findOrFail($id);
            $fechamento->delete();
            return response()->json(["success"=>True, "message"=>"Fechamento com o Id: $id deletado com sucesso"],200);
        } catch (Exception $e) {
            return response()->json(["success"=>False, "error"=> "Erro ao deletar o 'Fechamento'"],502);
        }
    }

    public function getByStatus($status){
        try {
            $status = $status == "ativo" ? "s" : "n";
            $cabecalho = (new Fechamentos())->getByStatus($status);    
            return response()->json(['success' => true, 'data' => $cabecalho]);
        } catch (Exception $e)  {
            return response()->json(['success' => false, "error" => $e->getMessage()]);
        }
    }

}
