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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCabecalho $request)
    {
        dd($request);
        $validatedData = $request->validated();
        dd($validatedData);

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
        //
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
        //
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
