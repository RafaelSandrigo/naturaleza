<?php

namespace App\Http\Controllers\Modulos;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestAlerta;
use App\Models\Alertas;
use Exception;
use Illuminate\Http\Request;

class ApiAlertasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $alertas = (new Alertas)->all();
            return response()->json(['success'=>True, 'data'=>$alertas],200);
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
    public function store(RequestAlerta $request)
    {
        try {
            
            $validatedData = $request->validated();
            $saved = (new Alertas())->insert($validatedData);
            if($saved){
                return response()->json(["success"=>True,"message"=>"Alerta Cadastrado com sucesso"],200);
            }
        } catch (Exception $e) {
            return response()->json(["success"=>false, "error"=>$e->getMessage()],502);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alertas  $alertas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $alerta = Alertas::findOrFail($id);
        } catch (Exception $e) {
            return response()->json(['message' => 'Alerta não encontrado'], 404);
        }
        try{
            return response()->json(["success"=>True, "data" => $alerta],200);
        }catch(Exception $e){
            return response()->json(["success"=>false, "error"=>"Erro ao encontrar o 'Alerta'"]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alertas  $alertas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $alerta = Alertas::findOrFail($id);
        } catch (Exception $e) {
            return response()->json(['message' => 'Alerta não encontrado'], 404);
        }

        try {
            $validatedData = $request->validated();
            $saved = $alerta->update($validatedData);
            if (!$saved) {
                return response()->json(['success' => False, 'eror' => "Erro ao atualizar o 'Alerta'"], 502);
            }
            return response()->json(['success' => True, 'message' => "Alerta atualizado com sucesso"], 200);
        } catch (Exception $e) {
            return response()->json(['success' => False, 'eror' => "Erro ao atualizar o 'Alerta'"], 502);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alertas  $alertas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $alerta = Alertas::findOrFail($id);
        } catch (Exception $e) {
            return response()->json(['message' => 'Alerta não encontrado'], 200);
        }

        try {
            $alerta->delete();
            if (!$alerta) {
                return response()->json(['success'=> False, 'error'=> "Erro ao deletar o Alerta"],502);
            }
            return response()->json(["success"=> True, 'message'=> "Alerta deletado com sucesso"]);
        } catch (Exception $e) {
            return response()->json(["success"=> False,'error'=> "Erro ao deletar o Alerta"],502);
        }
    }

    public function getByStatus(Request $status){
        try {
            $status = $status->status == "ativo" ? "s" : "n";
            $alerta = (new Alertas())->getByStatus($status);    
            return response()->json(['success' => true, 'data' => $alerta]);
        } catch (Exception $e)  {
            return response()->json(['success' => false, "error" => $e->getMessage()]);
        }
    }
}
