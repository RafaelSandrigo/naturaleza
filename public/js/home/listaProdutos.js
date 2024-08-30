let produtos;
$.ajax({
    url: '/api/produtos/',
    method: 'GET',
    success: function (response) {
        produtos = response['data'];
        let tbody = document.getElementById('tbody');
        produtos.forEach(produto => {
            let newRow = document.createElement('tr');
            newRow.innerHTML = `
            <td class="text-center align-middle">
                <input type="checkbox" name="status_produto" class="form-check-input" ${produto['status_produto'] === 's' ? 'checked' : ''} value="${produto['status_produto']}">
            </td>
            <td class="align-middle nomeproduto">
                <input type="text" name="nome_produto" value="${produto['nome_produto']}" class="form-control" style="max-width: 300px; width: 100%;">
            </td>
            <td class="text-center align-middle">
                <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm save-btn" name="salvarprodutoBtn">Salvar</button>
                </div>
            </td>
            <td name="id" hidden data-id="${produto['id']}"></td>
        `;
            tbody.appendChild(newRow);
            $(newRow).find('button[name="salvarprodutoBtn"]').on('click', function () {
                salvarProduto($(newRow));
            });
        });
    },
    error: function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseJSON.message);
    }
});

function salvarProduto(linha){
        let row = $(linha).closest('tr');
        let id = row.find('td[name="id"]').data('id');
        let status_produto = row.find('input[name="status_produto"]').is(':checked') ? 's' : 'n';
        let token = 'naturaleza';
        $.ajax({
        url: '/api/produtos/' + id, // URL para o recurso específico
        method: 'PUT', // Tipo de requisição
        contentType: 'application/json', // Tipo de dados sendo enviados
        data: JSON.stringify({
            _token: token, // Token CSRF
            status_produto: status_produto,
        }), // Dados no corpo da requisição
        success: function(response) {
            alert(response['message']);
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // console.log('Erro:', textStatus, errorThrown);
            alert(response['message']);
            // Opcional: Exibir uma mensagem de erro para o usuário
        }
        });
}