<?php

namespace App\Http\Controllers\Modulos;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCabecalho;
use App\Http\Requests\StoreCabecalho;
use App\Models\Cabecalho;
use DateTime;
use Exception;
use Illuminate\Http\Request;

class ApiCabecalhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $cabecalhos = (new Cabecalho())->all(); 
            return response()->json(["success" => true, "data" => $cabecalhos]);
        }catch(Exception $e){

        }

        try {
            return response()->json(['success' => true, 'data'=> "Nao disponivel"],404);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'data'=> "Nao disponivel"],502);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCabecalho $request)
    {
        try {
            $validatedData = $request->validarRequired();
            if($validatedData == false){
                return response()->json(["success" => 'false',"message" => "Todos os campos precisam ser informados"],502);
            }
            $validatedData = $request->validarFormatoDados();
        
            if($validatedData == false){
                throw new Exception("Erro na validacao dos dados. Dados invalidos");
            }
            $saved = (new Cabecalho())->insert($validatedData);
            if ($saved) {
                return response()->json(["success" => True,"message" => "Cabeçalho cadastrado com sucesso"], 200);
            }else{
                throw new Exception();	
            }
        } catch (Exception $e) {
            return response()->json(["success"=>false, "error"=>"Erro ao criar o cabeçalho"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cabecalho  $cabecalho
     * @return \Illuminate\Http\Response
     */
    public function show(Cabecalho $cabecalho)
    {
        try {
            return response()->json(['success' => true, 'data'=> "Nao disponivel"],404);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'data'=> "Nao disponivel"],502);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cabecalho  $cabecalho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cabecalho $cabecalho)
    {
        try {
            return response()->json(['success' => true, 'data'=> "Nao disponivel"],404);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'data'=> "Nao disponivel"],502);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cabecalho  $cabecalho
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cabecalho $cabecalho)
    {
        try {
            return response()->json(['success' => true, 'data'=> "Nao disponivel"],404);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'data'=> "Nao disponivel"],502);
        }
    }

    /**
     * Busca o cabeçalho que esta ativo. 
     * Retorna um json com o primeiro cabeçalho ativo encontrado
     * 
     * @return json
     */

    public function cabecalhoAtivo(){
        try {
            $cabecalho = (new Cabecalho())->buscaByStatus("s");    
            return response()->json(['success' => true, 'data' => $cabecalho]);
        } catch (Exception $e)  {
            return response()->json(['success' => false, "error" => $e->getMessage()]);
        }     
        
    }

}
