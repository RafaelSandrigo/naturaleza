@extends('master')
@section('content')

<style>
    body {
        background-color: #f8f9fa;
    }
    .form-container {
        max-width: 1000px;
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 40px auto;
    }
    .form-label {
        font-weight: bold;
    }
    .btn-primary, .btn-danger {
        width: 100%;
    }
    @media (min-width: 768px) {
        .btn-primary, .btn-danger {
            width: auto;
        }
    }
    .actions {
        gap: 10px;
    }
    textarea{
        min-width: 500px;
    }
</style>

<div class="container d-flex justify-content-center">
    <div class="form-container">
        <h1 class="text-center mb-4">Editar Cabeçalho</h1>
        <form id="editHeaderForm">
            <!-- Status -->
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="active" selected>Ativo</option>
                    <option value="inactive" {{($cabecalho->status_cabecalho == 's') ? 'selected' :''}}>Inativo</option>
                </select>
            </div>

            <!-- Nome do Cabeçalho -->
            <div class="mb-3">
                <label for="nomeCabecalho" class="form-label">Nome do Cabeçalho</label>
                <input type="text" class="form-control" id="nomeCabecalho" name="nomeCabecalho" placeholder="Digite o nome do cabeçalho" value="{{$cabecalho->nome_cabecalho}}">
            </div>

            <!-- Horário Limite -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="horarioLimite" class="form-label">Horário Limite</label>
                    <input type="time" class="form-control" id="horarioLimite" name="horarioLimite" value="{{$cabecalho->horario_pedido}}">
                </div>

                <!-- Horário de Entrega -->
                <div class="col-md-6">
                    <label for="horarioEntrega" class="form-label">Horário de Entrega</label>
                    <div class="row g-2">
                        <div class="col">
                            <input type="time" class="form-control" id="horarioEntregaInicio" name="horarioEntregaInicio" value="{{$cabecalho->inic_horas_entrega}}">
                        </div>
                        <div class="col">
                            <input type="time" class="form-control" id="horarioEntregaFim" name="horarioEntregaFim" value="{{$cabecalho->fim_horas_entrega}}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dia Limite -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="diaLimite" class="form-label">Dia Limite</label>
                    <select name="dia_limite" id="dia_limite" class="form-select">
                        <option value="Segunda-feira" {{($cabecalho->dia_pedido == 'Segunda-feira') ? 'selected' :''}}>Segunda-feira</option>
                        <option value="Terça-feira" {{($cabecalho->dia_pedido == 'Terça-feira') ? 'selected' :''}}>Terça-feira</option>
                        <option value="Quarta-feira" {{($cabecalho->dia_pedido == 'Quarta-feira') ? 'selected' :''}}>Quarta-feira</option>
                        <option value="Quinta-feira" {{($cabecalho->dia_pedido == 'Quinta-feira') ? 'selected' :''}}>Quinta-feira</option>
                        <option value="Sexta-feira" {{($cabecalho->dia_pedido == 'Sexta-feira') ? 'selected' :''}}>Sexta-feira</option>
                        <option value="Sabado-feira" {{($cabecalho->dia_pedido == 'Sabado-feira') ? 'selected' :''}}>Sabado-feira</option>
                        <option value="Domingo-feira" {{($cabecalho->dia_pedido == 'Domingo-feira') ? 'selected' :''}}>Domingo-feira</option>
                    </select>
                </div>

                <!-- Dia da Entrega -->
                <div class="col-md-6">
                    <label for="diaEntrega" class="form-label">Dia da Entrega</label>
                    <select name="dia_entrega" id="dia_entrega" class="form-select">
                        <option value="Segunda-feira" {{($cabecalho->dia_entrega == 'Segunda-feira') ? 'selected' :''}}>Segunda-feira</option>
                        <option value="Terça-feira" {{($cabecalho->dia_entrega == 'Terça-feira') ? 'selected' :''}}>Terça-feira</option>
                        <option value="Quarta-feira" {{($cabecalho->dia_entrega == 'Quarta-feira') ? 'selected' :''}}>Quarta-feira</option>
                        <option value="Quinta-feira" {{($cabecalho->dia_entrega == 'Quinta-feira') ? 'selected' :''}}>Quinta-feira</option>
                        <option value="Sexta-feira" {{($cabecalho->dia_entrega == 'Sexta-feira') ? 'selected' :''}}>Sexta-feira</option>
                        <option value="Sabado-feira" {{($cabecalho->dia_entrega == 'Sabado-feira') ? 'selected' :''}}>Sabado-feira</option>
                        <option value="Domingo-feira" {{($cabecalho->dia_entrega == 'Domingo-feira') ? 'selected' :''}}>Domingo-feira</option>
                    </select>
                </div>
            </div>

            <!-- Mensagem -->
            <div class="mb-4">
                <label for="mensagem" class="form-label">Mensagem</label>
                <textarea class="form-control" id="mensagem" name="mensagem" rows="4" placeholder="Digite a mensagem">{{$cabecalho->texto_cabecalho}} aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</textarea>
            </div>

            <!-- Ações -->
            <div class="d-flex justify-content-between actions">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-danger">Excluir</button>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('js/formatting/fields/textarea.js') }}"></script>
<script>
let textarea = document.getElementById('mensagem');
// if (!textarea.innerHTML == '' || !textarea.innerHTML == ' ') {
// }
ajustaTextareaHeight('mensagem');

</script>
@endsection