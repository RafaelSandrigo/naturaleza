@extends('master')
@section('content')
<link rel="stylesheet" href="{{ asset('css/layout/tables.css') }}">
<div class="container mt-5">
    <h1 class="text-center mb-4">Listagem de Categorias</h1>
    <div class="d-flex justify-content-end mb-3">
        <button id="addCategoriaBtn" class="btn btn-primary">Adicionar Categoria</button>
    </div>
    <table class="table table-striped table-bordered" style="max-width: 70%;">
        @csrf
        <thead class="table-dark text-center">
            <tr>
                <th style="width: 5%;">ID</th>
                <th style="width: 10%;">Status</th>
                <th style="width: 50%;">Nome da Categoria</th>
                <th style="width: 35%;">Ações</th>
            </tr>
        </thead>
        <tbody id="tbody">
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{asset("js/pageListaCatg/listaCategorias.js")}}"></script> 
<script src="{{asset("js/pageListaCatg/addCategoria.js")}}"></script> 


@endsection