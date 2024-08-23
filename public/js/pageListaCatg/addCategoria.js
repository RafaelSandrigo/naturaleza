document.getElementById('addCategoriaBtn').addEventListener('click', function() {
    var tbody = document.getElementById('tbody');
    var newRow = document.createElement('tr');

    newRow.innerHTML = `
        <td class="text-center align-middle">
                <label type="text" name="id_categoria" class="sr-only" data-id="X" value="X">X</label>
            </td>
            <td class="text-center align-middle">
                <input type="checkbox" name="status_categoria" class="form-check-input" value="n">
            </td>
            <td class="align-middle nomeCategoria">
                <input type="text" name="nome_categoria" value="Nome Categoria" class="form-control" style="max-width: 300px; width: 100%;">
            </td>
            <td class="text-center align-middle">
                <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm save-btn" name="criaProductBtn">Criar</button>
                    <button type="button" class="btn btn-danger btn-sm" name="cancelarProdutoBtn">Cancelar</button>
                </div>
            </td>
    `;

    tbody.insertBefore(newRow, tbody.firstChild);

    // Adiciona o evento de criação do categoria ao botão "Criar"
    $(newRow).find('button[name="criaProductBtn"]').on('click', function() {
        console.log('criação do categoria');
        criarCategoria($(newRow));
    });
    // Adiciona o evento de cacelar na categoria no botão "cancelar"
    $(newRow).find('button[name="cancelarProdutoBtn"]').on('click', function() {
        cancelarCategoria($(newRow));
    });

});

async function criarCategoria(row) {
    let nome_categoria = row.find('input[name="nome_categoria"]').val();
    let status_categoria = row.find('input[name="status_categoria"]').val();
    let token = $('input[name="_token"]').val();
    console.log(status_categoria);
    console.log(nome_categoria);
    console.log(token);

    $.ajax({
        url: '/api/categorias/', // URL para o recurso específico
                method: 'POST', // Tipo de requisição
                contentType: 'application/json', // Tipo de dados sendo enviados
                data: JSON.stringify({
                    _token: token, // Token CSRF
                    nome_categoria: nome_categoria,
                    status_categoria: status_categoria,
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
    })

}

async function cancelarCategoria(row) {
    row.remove();
}