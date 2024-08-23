@extends('master')
@section('content')
    <style>
        .header-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header-textarea {
            resize: none;
            overflow-y: auto;
            height: auto;
            min-height: 150px;
        }

        /* Ajusta o tamanho do textarea conforme o conteúdo */
        .header-textarea:focus {
            height: auto;
        }
    </style>

<div class="container mt-5">
    <h1 class="text-center mb-4">Listagem de Cabeçalho</h1>
    <div class="d-flex justify-content-end mb-3">
        <button id="addProductBtn" class="btn btn-primary">Adicionar Cabeçalho</button>
    </div>

    <table class="table table-striped table-bordered">
        @csrf
        <thead class="table-dark text-center">
            <tr>
                <th>Status</th>
                <th>Nome do Cabeçalho</th>
                <th>Horario limite</th>
                <th>Dia limite</th>
                <th>Dia da Entrega</th>
                <th>Horario de entrega</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="tbody">
            <tr>
                {{-- Status do cabecalho --}}
                <td class="text-center align-middle">
                    <input type="checkbox" name="status_cabecalho" class="form-check-input" checked   >
                </td>
                {{-- Nome do cabecalho --}}
                <td class="text-center align-middle">
                    <input type="text" name="nome_cabecalho" value="Nome" class="form-control">
                </td>
                {{-- Preço --}}
                <td class="text-center align-middle">
                    <input type="time" name="horario_pedido" value="12:00" class="form-control horario-input" >
                </td>
                {{-- Categoria --}}
                <td class="text-center align-middle">
                    <select name="dia_limite" id="dia_limite" class="form-select">
                        <option value="Segunda-feira" selected>Segunda-feira</option>
                        <option value="Terça-feira">Terça-feira</option>
                        <option value="Quarta-feira">Quarta-feira</option>
                        <option value="Quinta-feira">Quinta-feira</option>
                        <option value="Sexta-feira">Sexta-feira</option>
                        <option value="Sabado-feira">Sabado-feira</option>
                        <option value="Domingo-feira">Domingo-feira</option>
                    </select>
                </td>
                {{-- Medida --}}
                <td class="text-center align-middle">
                    <select name="dia_entrega" id="dia_entrega" class="form-select">
                        <option value="Segunda-feira">Segunda-feira</option>
                        <option value="Terça-feira" selected>Terça-feira</option>
                        <option value="Quarta-feira">Quarta-feira</option>
                        <option value="Quinta-feira">Quinta-feira</option>
                        <option value="Sexta-feira">Sexta-feira</option>
                        <option value="Sabado-feira">Sabado-feira</option>
                        <option value="Domingo-feira">Domingo-feira</option>
                    </select>
                </td>
                <td class="text-center align-middle horario-td">
                    <input name="inic_horas_entrega" type="time" value="17:00" class="form-control horario-input">
                    <p  >às</p>
                    <input name="fim_horas_entrega" type="time" value="19:00" class="form-control horario-input">
                </td>
                <td class="text-center align-middle">
                    <div class="btn-group">
                        <button class="btn btn-success save-btn">Salvar</button>
                        <button type="button" class="btn btn-danger btn-sm">Deletar</button>
                        <button type="button" class="btn btn-primary btn-sm">Editar</button>
                    </div>
                </td>
                <td name="id" hidden data-id="1"></td>
            </tr>
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset("css/layout/cabecalho.css")}}">


</div>
@endsection
