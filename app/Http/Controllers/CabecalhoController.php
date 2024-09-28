<?php

namespace App\Http\Controllers;

use App\Http\Requests\CabecalhoRequest;
use App\Http\Requests\RequestCabecalho;
use App\Http\Requests\StoreCabecalho;
use App\Models\Cabecalho;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CabecalhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabecalhos = (new Cabecalho())->all();
        return view('cabecalho', ['title' => 'Cabeçalho','cabecalhos' =>$cabecalhos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Cabecalho  $cabecalho
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $cabecalho = Cabecalho::findOrFail($id);
        } catch (Exception $e) {
            return response()->json(['message' => 'Cabeçalho não encontrado'], 404);
        }

        $cabecalho->inic_horas_entrega = $cabecalho->formatTime($cabecalho->inic_horas_entrega);
        $cabecalho->fim_horas_entrega = $cabecalho->formatTime($cabecalho->fim_horas_entrega);
        $cabecalho->horario_pedido = $cabecalho->formatTime($cabecalho->horario_pedido);
        return view('editCabecalho', ['title' => "Editar Cabeçalho", "cabecalho" => $cabecalho]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cabecalho  $cabecalho
     * @return \Illuminate\Http\Response
     */
    public function edit(Cabecalho $cabecalho)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cabecalho  $cabecalho
     * @return \Illuminate\Http\Response
     */
    public function update(RequestCabecalho $request,$id)
    {   
        try {
            $cabecalho = Cabecalho::findOrFail($id);
        } catch (Exception $e) {
            return response()->json(['message' => 'Cabeçalho não encontrado'], 404);
        }

        try {
            $validatedData = $request->validarRequired();
            if($validatedData == false){
                return response()->json(["success" => 'false',"message" => "Todos os campos precisam ser informados"],502);
            }
            $validatedData = $request->validarFormatoDados();
        
            if($validatedData == false){
                throw new Exception("Erro na validacao dos dados. Dados invalidos");
            }
            $update = $cabecalho->update($validatedData);
            if(!$update){
                throw new Exception('Falha ao atualizar a cab$cabecalho');
            }
            return response()->json(['success'=> 'true', 'message' => 'Cabeçalho atualizado com sucesso', 'data' => $validatedData], 200);
        } catch (Exception $e) {
            Log::warning('Conta não editada', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 502);
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
        //
    }
}
