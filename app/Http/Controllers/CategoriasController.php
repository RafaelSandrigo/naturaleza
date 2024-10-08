<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Exception;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categorias', ['title' => 'Categorias']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
    public function store(Request $request)
    {
        try {
            return response()->json(['success' => true, 'data'=> "Nao disponivel"],404);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'data'=> "Nao disponivel"],502);
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
        try {
            return response()->json(['success' => true, 'data'=> "Nao disponivel"],404);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'data'=> "Nao disponivel"],502);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorias $categorias)
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
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorias $categorias)
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
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorias $categorias)
    {
        try {
            return response()->json(['success' => true, 'data'=> "Nao disponivel"],404);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'data'=> "Nao disponivel"],502);
        }
    }
}
