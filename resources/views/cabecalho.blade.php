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
    <h1 class="text-center mb-4">Listagem de Cabeçalhos</h1>
    <div class="d-flex justify-content-end mb-3">
        <button id="addProductBtn" class="btn btn-primary">Adicionar Cabeçalhos</button>
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
            @foreach ($cabecalhos as $cabecalho)
            <tr>
                {{-- Status do cabecalho --}}
                <td class="text-center align-middle">
                    <input type="checkbox" name="status_cabecalho" class="form-check-input" {{($cabecalho->status_cabecalho === 's') ? 'checked' : '' }} value="{{($cabecalho->status_cabecalho = 's') ? 's' : 'n' }}" >
                </td>
                {{-- Nome do cabecalho --}}
                <td class="text-center align-middle">
                    <input type="text" name="nome_cabecalho" value="{{$cabecalho->nome_cabecalho}}" class="form-control">
                </td>
                {{-- Preço --}}
                <td class="text-center align-middle">
                    <input type="time" name="horario_pedido" value="{{$cabecalho->formatTime($cabecalho->horario_pedido)}}" class="form-control horario-input" >
                </td>
                {{-- Categoria --}}
                <td class="text-center align-middle">
                    <select name="dia_pedido" id="dia_pedido" class="form-select">
                        <option value="Segunda-feira" {{($cabecalho->dia_pedido == 'Segunda-feira') ? 'selected' :''}}>Segunda-feira</option>
                        <option value="Terça-feira" {{($cabecalho->dia_pedido == 'Terça-feira') ? 'selected' :''}}>Terça-feira</option>
                        <option value="Quarta-feira" {{($cabecalho->dia_pedido == 'Quarta-feira') ? 'selected' :''}}>Quarta-feira</option>
                        <option value="Quinta-feira" {{($cabecalho->dia_pedido == 'Quinta-feira') ? 'selected' :''}}>Quinta-feira</option>
                        <option value="Sexta-feira" {{($cabecalho->dia_pedido == 'Sexta-feira') ? 'selected' :''}}>Sexta-feira</option>
                        <option value="Sabado-feira" {{($cabecalho->dia_pedido == 'Sabado-feira') ? 'selected' :''}}>Sabado-feira</option>
                        <option value="Domingo-feira" {{($cabecalho->dia_pedido == 'Domingo-feira') ? 'selected' :''}}>Domingo-feira</option>
                    </select>
                </td>
                {{-- Medida --}}
                <td class="text-center align-middle">
                    <select name="dia_entrega" id="dia_entrega" class="form-select">
                        <option value="Segunda-feira" {{($cabecalho->dia_entrega == 'Segunda-feira') ? 'selected' :''}}>Segunda-feira</option>
                        <option value="Terça-feira" {{($cabecalho->dia_entrega == 'Terça-feira') ? 'selected' :''}}>Terça-feira</option>
                        <option value="Quarta-feira" {{($cabecalho->dia_entrega == 'Quarta-feira') ? 'selected' :''}}>Quarta-feira</option>
                        <option value="Quinta-feira" {{($cabecalho->dia_entrega == 'Quinta-feira') ? 'selected' :''}}>Quinta-feira</option>
                        <option value="Sexta-feira" {{($cabecalho->dia_entrega == 'Sexta-feira') ? 'selected' :''}}>Sexta-feira</option>
                        <option value="Sabado-feira" {{($cabecalho->dia_entrega == 'Sabado-feira') ? 'selected' :''}}>Sabado-feira</option>
                        <option value="Domingo-feira" {{($cabecalho->dia_entrega == 'Domingo-feira') ? 'selected' :''}}>Domingo-feira</option>
                    </select>
                </td>
                <td class="text-center align-middle horario-td">
                    <input name="inic_horas_entrega" type="time" value="{{$cabecalho->formatTime($cabecalho->inic_horas_entrega)}}" class="form-control horario-input">
                    <p  >às</p>
                    <input name="fim_horas_entrega" type="time" value="{{$cabecalho->formatTime($cabecalho->fim_horas_entrega)}}" class="form-control horario-input">
                </td>
                <td class="text-center align-middle">
                    <div class="btn-group">
                        <button class="btn btn-success save-btn">Salvar</button>
                        <button type="button" class="btn btn-danger btn-sm">Deletar</button>
                        <button type="button" class="btn btn-primary btn-sm"  >Editar</button>
                    </div>
                </td>
                <td name="id" hidden data-id="{{$cabecalho->id}}"></td>
            </tr>
            @endforeach
        </tbody>
    </table>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset("css/layout/cabecalho.css")}}">
    <script>
        $(document).ready(function() {
            $('.save-btn').click(function() {
                let row = $(this).closest('tr');
                let id = row.find('td[name="id"]').data('id');
                let status_cabecalho = row.find('input[name="status_cabecalho"]').is(':checked') ? 's' : 'n';
                let nome_cabecalho = row.find('input[name="nome_cabecalho"]').val();
                let horario_pedido = row.find('input[name="horario_pedido"]').val();
                let dia_pedido = row.find('select[name="dia_pedido"]').val();
                let inic_horas_entrega = row.find('input[name="inic_horas_entrega"]').val();
                let fim_horas_entrega = row.find('input[name="fim_horas_entrega"]').val();
                let dia_entrega = row.find('select[name="dia_entrega"]').val();
                let token = $('input[name="_token"]').val();
                
                console.log(status_cabecalho);
                console.log(nome_cabecalho);
                console.log(horario_pedido);
                console.log(dia_pedido);
                console.log(inic_horas_entrega);
                console.log(fim_horas_entrega);
                console.log(dia_entrega);

                $.ajax({
                    url: '/cabecalhos/' + id, // URL para o recurso específico
                    method: 'PUT', // Tipo de requisição
                    contentType: 'application/json', // Tipo de dados sendo enviados
                    data: JSON.stringify({
                    _token: token, // Token CSRF
                    status_cabecalho: status_cabecalho,
                    nome_cabecalho: nome_cabecalho,
                    horario_pedido: horario_pedido,
                    dia_pedido: dia_pedido,
                    inic_horas_entrega: inic_horas_entrega,
                    fim_horas_entrega: fim_horas_entrega,
                    dia_entrega: dia_entrega,
                }), // Dados no corpo da requisição
                success: function(response) {
                    // console.log('Resposta do servidor:', response);
                    alert(response['message']);
                    // Opcional: Atualizar a interface ou exibir uma mensagem
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // console.log('Erro:', textStatus, errorThrown);
                    alert(response['message']);
                    // Opcional: Exibir uma mensagem de erro para o usuário
                }
                });
            });

            $('.btn-primary').click(function() {
                let row = $(this).closest('tr');
                let id = row.find('td[name="id"]').data('id');
                window.location.href = 'http://project.test/cabecalhos/' + id;
            });


            $('.btn-danger').click(function() {
                let resposta = confirm("Você realmente quer deletar o cabecalho ?");
                if (resposta == true) {
                    
                    let row = $(this).closest('tr');
                    let id = row.find('td[name="id"]').data('id');
                    let token = $('input[name="_token"]').val();
                    $.ajax({
                        url: '/cabecalhos/' + id, // URL para o recurso específico
                        method: 'DELETE', // Tipo de requisição
                        contentType: 'application/json', // Tipo de dados sendo enviados
                        data: JSON.stringify({
                            _token: token, // Token CSRF
                        }), // Dados no corpo da requisição
                        success: function(response) {
                            console.log('Resposta do servidor:', response);
                            alert(response['message']);
                            window.location.reload(true);
                            // Opcional: Atualizar a interface ou exibir uma mensagem
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Erro:', textStatus, errorThrown);
                        alert(response['message']);
                        // Opcional: Exibir uma mensagem de erro para o usuário
                    }
                });
            }
            })
        });
    </script>

</div>
@endsection
