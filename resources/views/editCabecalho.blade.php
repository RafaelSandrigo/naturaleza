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
            <input type="text" value="{{$cabecalho->id}}" hidden>
            <h1 class="text-center mb-4">Editar Cabeçalho</h1>
        
            <!-- Status -->
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status_cabecalho">
                    <option value="s" {{($cabecalho->status_cabecalho == 's') ? 'selected' :''}}>Ativo</option>
                    <option value="n" {{($cabecalho->status_cabecalho == 'n') ? 'selected' :''}}>Inativo</option>
                </select>
            </div>

            <!-- Nome do Cabeçalho -->
            <div class="mb-3">
                <label for="nomeCabecalho" class="form-label">Nome do Cabeçalho</label>
                <input type="text" class="form-control" id="nomeCabecalho" name="nome_cabecalho" placeholder="Digite o nome do cabeçalho" value="{{$cabecalho->nome_cabecalho}}">
            </div>

            <!-- Horário Limite -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="horarioLimite" class="form-label">Horário Pedido</label>
                    <input type="time" class="form-control" id="horarioLimite" name="horario_pedido" value="{{$cabecalho->horario_pedido}}">
                </div>

                <!-- Horário de Entrega -->
                <div class="col-md-6">
                    <label for="horarioEntrega" class="form-label">Horário de Entrega</label>
                    <div class="row g-2">
                        <div class="col">
                            <input type="time" class="form-control" id="horarioEntregaInicio" name="inic_horas_entrega" value="{{$cabecalho->inic_horas_entrega}}">
                        </div>
                        <div class="col">
                            <input type="time" class="form-control" id="horarioEntregaFim" name="fim_horas_entrega" value="{{$cabecalho->fim_horas_entrega}}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dia Limite -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="diaLimite" class="form-label">Dia Limite</label>
                    <select name="dia_pedido" id="dia_limite" class="form-select">
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
                <textarea class="form-control" id="mensagem" name="mensagem" rows="4" placeholder="Digite a mensagem">{{$cabecalho->texto_cabecalho}}</textarea>
            </div>

            <!-- Ações -->
            <div>
                <button type="button" class="btn btn-primary">Salvar</button
            </div>
            @csrf
    </div>
</div>
<script src="{{ asset('js/formatting/fields/textarea.js') }}"></script>
<script>

let textarea = document.getElementById('mensagem');

$(document).ready(function() {
    $('.btn-primary').click(function() {
        let token = $('input[name="_token"]').val();
        let id = $('input[type="text"]').val();  // Pegando o ID do cabeçalho
        
        let status_cabecalho = $('select[name="status_cabecalho"]').val();
        let nome_cabecalho = $('input[name="nome_cabecalho"]').val();
        let horario_pedido = $('input[name="horario_pedido"]').val();
        let inic_horas_entrega = $('input[name="inic_horas_entrega"]').val();
        let fim_horas_entrega = $('input[name="fim_horas_entrega"]').val();
        let dia_pedido = $('select[name="dia_pedido"]').val();
        let dia_entrega = $('select[name="dia_entrega"]').val();
        let mensagem = $('textarea[name="mensagem"]').val();
        
        $.ajax({
            url: '/cabecalhos/' + id, // URL para o recurso específico
            method: 'PUT', // Tipo de requisição
            contentType: 'application/json', // Tipo de dados sendo enviados
            data: JSON.stringify({
                _token: token, // Token CSRF
                status_cabecalho: status_cabecalho,
                nome_cabecalho: nome_cabecalho,
                horario_pedido: horario_pedido,
                inic_horas_entrega: inic_horas_entrega,
                fim_horas_entrega: fim_horas_entrega,
                dia_pedido: dia_pedido,
                dia_entrega: dia_entrega,
                texto_cabecalho: mensagem,
            }), // Dados no corpo da requisição
            success: function(response) {
                alert(response['message']);
                // Opcional: Atualizar a interface ou exibir uma mensagem de sucesso
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Erro ao salvar os dados: ' + textStatus);
                // Opcional: Exibir uma mensagem de erro para o usuário
            }
        });
    });
});
document.addEventListener("DOMContentLoaded", function() {

    ajustaTextareaHeight('mensagem');
});

</script>
@endsection