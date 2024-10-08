<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', ['title' => 'Home']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return response()->json(['success' => true, 'data'=> "Nao disponivel"],200);
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
            return response()->json(['success' => true, 'data'=> "Nao disponivel"],200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'data'=> "Nao disponivel"],502);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return response()->json(['success' => true, 'data'=> "Nao disponivel"],200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'data'=> "Nao disponivel"],502);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            return response()->json(['success' => true, 'data'=> "Nao disponivel"],200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'data'=> "Nao disponivel"],502);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            return response()->json(['success' => true, 'data'=> "Nao disponivel"],200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'data'=> "Nao disponivel"],502);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            return response()->json(['success' => true, 'data'=> "Nao disponivel"],200);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'data'=> "Nao disponivel"],502);
        }
    }
}
