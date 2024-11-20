@extends('master')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Listagem de Produtos</h1>
        <div class="d-flex justify-content-end mb-3">
            <button id="addProductBtn" class="btn btn-primary">Adicionar Produto</button>
        </div>
        <table class="table table-striped table-bordered">
            @csrf
            <thead class="table-dark text-center">
                <tr>
                    <th>Status</th>
                    <th>Nome do Produto</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Medida</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <!-- Exemplo de produto -->

                @foreach ($produtos as $produto)
                    <tr>
                        {{-- Status do produto --}}
                        <td class="text-center align-middle"><input type="checkbox" name="status_produto" class="form-check-input" {{($produto->status_produto === 's') ? 'checked' : '' }} value="{{($produto->status_produto = 's') ? 's' : 'n' }}"></td>
                        {{-- Nome do produto --}}
                        <td class="text-center align-middle"><input type="text" name="nome_produto" value="{{$produto->nome_produto}}" class="form-control"></td>
                        {{-- Preço --}}
                        <td class="text-center align-middle"><input type="text" name="preco_produto" value="{{ number_format($produto->preco_produto, 2, ',', '.') }}" class="form-control" onkeyup="formatarPreco(this)"></td>
                        {{-- Categoria --}}
                        <td class="text-center align-middle">
                            <select name="categoria_produto" id="categoria" class="form-select">
                                @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}" {{($categoria->id === $produto->id_categoria) ? 'selected' : ''}}>
                                        {{$categoria->nome_categoria}}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        {{-- Medida --}}
                        <td class="text-center align-middle">
                            <input name="medida_produto" type="text" value="{{$produto->medida_produto}}" class="form-control">
                        </td>
                        <td class="text-center align-middle">
                            <div class="btn-group">
                                <button class="btn btn-success save-btn">Salvar</button>
                                <button type="button" class="btn btn-danger btn-sm">Deletar</button>
                            </div>
                        </td>
                        <td name="id" hidden data-id="{{$produto->id}}"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{asset("js/formatting/validaInput.js")}}"></script>  
    <script src="{{asset("js/formatting/formataInput.js")}}"></script>  
    <script src="{{asset("js/pageListProd/criaProd.js")}}"></script>  
    <script>
        $(document).ready(function() {
            $('.save-btn').click(function() {
                let row = $(this).closest('tr');
                let id = row.find('td[name="id"]').data('id');
                let status_produto = row.find('input[name="status_produto"]').is(':checked') ? 's' : 'n';;
                let nome_produto = row.find('input[name="nome_produto"]').val();
                let preco_produto = parseFloat(row.find('input[name="preco_produto"]').val().replace(',','.'));
                let categoria_produto = parseInt(row.find('select[name="categoria_produto"]').val());
                let medida_produto = row.find('input[name="medida_produto"]').val();
                let token = $('input[name="_token"]').val();
                $.ajax({
                url: '/produtos/' + id, // URL para o recurso específico
                method: 'PUT', // Tipo de requisição
                contentType: 'application/json', // Tipo de dados sendo enviados
                data: JSON.stringify({
                    _token: token, // Token CSRF
                    nome_produto: nome_produto,
                    medida_produto: medida_produto,
                    preco_produto: preco_produto,
                    id_categoria: categoria_produto,
                    status_produto: status_produto,
                    ordem: 'asc',
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

            $('.btn-danger').click(function() {
                let resposta = confirm("Você realmente quer deletar o produto ?");
                if (resposta == true) {
                    
                    let row = $(this).closest('tr');
                    let id = row.find('td[name="id"]').data('id');
                    let token = $('input[name="_token"]').val();
                    $.ajax({
                        url: '/produtos/' + id, // URL para o recurso específico
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
@endsection
