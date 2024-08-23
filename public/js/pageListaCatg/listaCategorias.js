let categorias;
$.ajax({
    url: '/api/categorias/', 
    method: 'GET', 
    success: function(response) {
        categorias = response['categorias'];
        gerarCategorias(categorias);
    },
    error: function(jqXHR, textStatus, errorThrown) {        
        alert(jqXHR.responseJSON.message);        
    }
});

async function gerarCategorias(categorias){
    let tbody = document.getElementById('tbody');
    categorias.forEach(categoria => {
        
        // Cria uma nova linha para cada categoria
        let newRow = document.createElement('tr');
        
        newRow.innerHTML = `
            <td class="text-center align-middle">
                <label type="text" name="id_categoria" class="sr-only" data-id="${categoria.id}" value="${categoria.id}">${categoria.id}</label>
            </td>
            <td class="text-center align-middle">
                <input type="checkbox" name="status_categoria" class="form-check-input" ${categoria.status_categoria === 's' ? 'checked' : ''} value="${categoria.status_categoria}">
            </td>
            <td class="align-middle nomeCategoria">
                <input type="text" name="nome_categoria" value="${categoria.nome_categoria}" class="form-control" style="max-width: 300px; width: 100%;">
            </td>
            <td class="text-center align-middle">
                <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm save-btn" name="salvarCategoriaBtn">Salvar</button>
                    <button type="button" class="btn btn-danger btn-sm" name="deletarCategoriaBtn">Deletar</button>
                </div>
            </td>
        `;
        
        tbody.appendChild(newRow);

        $(newRow).find('button[name="salvarCategoriaBtn"]').on('click', function() {
            salvarCategoria($(newRow));
        });
        $(newRow).find('button[name="deletarCategoriaBtn"]').on('click', function() {
            deletarCategoria($(newRow));
        });
    });
}

async function salvarCategoria(row){
    var status_categoria = row.find('input[name="status_categoria"]').is(':checked') ? 's' : 'n';
    var nome_categoria = row.find('input[name="nome_categoria"]').val();
    var id = row.find('label[name="id_categoria"]').data('id');
    var token = $('input[name="_token"]').val();

    console.log(status_categoria);
    console.log(nome_categoria);
    $.ajax({
        url: '/api/categorias/'+ id, 
        method: 'PUT', 
        contentType: 'application/json', // Tipo de dados sendo enviados
        data: JSON.stringify({
            _token: token, // Token CSRF
            nome_categoria: nome_categoria,
            status_categoria: status_categoria,
        }),
        success: function(response) {
            categorias = response['categorias'];
            alert(response['message']);
            console.log(response['data']);
        },
        error: function(jqXHR, textStatus, errorThrown) { 
            try{       
                alert(jqXHR.responseJSON.message);
                alert(response['data']);
            }catch(e){
                alert('Erro ao salvar a categoria');
             }
        }
    })

}

async function deletarCategoria(row){
        let id = row.find('label[name="id_categoria"]').data('id');
        let token = $('input[name="_token"]').val();
        
        let resposta = confirm("Você realmente quer deletar o produto ?");
        if (resposta == true) {
            $.ajax({
                url: '/api/categorias/' + id, // URL para o recurso específico
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
}