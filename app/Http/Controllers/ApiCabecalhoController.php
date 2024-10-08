<?php

namespace App\Http\Controllers;

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
    public function store(StoreCabecalho $request)
    {

        try {
            if(empty($validatedData)){
                throw new Exception();
            }
            $saved = (new Cabecalho)->insert($validatedData);

            return response()->json(["success" => $saved, "message" => 'Cabeçalho cadastrado com sucesso']);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage(), "message" => 'Erro ao cadastrar Categoria'], 502);
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

}
