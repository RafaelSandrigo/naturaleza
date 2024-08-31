<?php

namespace App\Http\Controllers;

use App\Models\Cabecalho;
use Illuminate\Http\Request;

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
    public function show(Cabecalho $cabecalho)
    {
        
        $cabecalho->inic_horas_entrega = $cabecalho->formatTime($cabecalho->inic_horas_entrega);
        $cabecalho->fim_horas_entrega = $cabecalho->formatTime($cabecalho->fim_horas_entrega);
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
