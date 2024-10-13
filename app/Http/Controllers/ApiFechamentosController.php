<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        try {
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fechamentos  $fechamentos
     * @return \Illuminate\Http\Response
     */
    public function show(Fechamentos $fechamentos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fechamentos  $fechamentos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fechamentos $fechamentos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fechamentos  $fechamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fechamentos $fechamentos)
    {
        //
    }
}
