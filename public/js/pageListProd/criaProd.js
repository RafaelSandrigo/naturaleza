
// Função para buscar categorias via AJAX
function buscarCategorias(selectElement) {
    $.ajax({
        url: 'http://project.test/api/categorias', // URL da rota que retorna as categorias
        type: 'GET', // Tipo da requisição
        dataType: 'json', // Tipo de dado esperado de retorno (JSON)
        success: function(categorias) {
            categorias['categorias'].forEach(function(categoria) {  
                var option = document.createElement('option');
                option.value = categoria.id;
                option.textContent = categoria.nome_categoria;
                selectElement.append(option); // Adiciona cada opção ao select
            });
        },
        error: function(xhr, status, error) {
            console.error('Erro ao buscar categorias:', error);
        }
    });
}

// Função para adicionar uma nova linha ao começo da tabela
document.getElementById('addProductBtn').addEventListener('click', function() {
    var tbody = document.getElementById('tbody');
    var newRow = document.createElement('tr');

    newRow.innerHTML = `
        <td><input type="checkbox" name="status_produto" class="form-check-input" value="n"></td>
        <td><input type="text" name="nome_produto" value="" class="form-control"></td>
        <td><input type="text" name="preco_produto" value="" class="form-control" onkeyup="formatarPreco(this)"></td>
        <td>
            <select name="categoria_produto" class="form-select" id="categoria" id></select>
        </td>
        <td><input name="medida_produto" type="text" value="" class="form-control"></td>
        <td><button class="btn btn-success save-btn" id="criaProductBtn">Criar</button></td>
        <td><button type="button" class="btn btn-outline-danger btn-sm" id="cancelarProdutoBtn">Cancelar</button></td>
        <td name="id" hidden data-id=""></td>
    `;

    tbody.insertBefore(newRow, tbody.firstChild);



    // Preenche o select de categorias na nova linha
    var selectElement = newRow.querySelector('#categoria');
    buscarCategorias(selectElement);

    // Adiciona o evento de criação do produto ao botão "Criar"
    $(newRow).find('#criaProductBtn').on('click', function() {
        criarProduto($(newRow));
    });
    $(newRow).find('#cancelarProdutoBtn').on('click', function() {
        cancelaProduto($(newRow));
    });

});


// Função para criar um produto via AJAX
function criarProduto(row) {
    if (!validarCampos(row)) {
        return; // Se os campos não foram preenchidos corretamente, sai da função
    }

    var status_produto = row.find('input[name="status_produto"]').is(':checked') ? 's' : 'n';
    var nome_produto = row.find('input[name="nome_produto"]').val().trim();
    var preco_produto = parseFloat(row.find('input[name="preco_produto"]').val().replace(',', '.'));
    var categoria_produto = parseInt(row.find('select[name="categoria_produto"]').val());
    var medida_produto = row.find('input[name="medida_produto"]').val().trim();
    var token = $('input[name="_token"]').val();

    $.ajax({
        url: '/produtos', // URL para o recurso específico
        method: 'POST', // Tipo de requisição
        contentType: 'application/json', // Tipo de dados sendo enviados
        data: JSON.stringify({
            _token: token, // Token CSRF
            nome_produto: nome_produto,
            medida_produto: medida_produto,
            preco_produto: preco_produto,
            id_categoria: categoria_produto,
            status_produto: status_produto,
        }), // Dados no corpo da requisição
        success: function(response) {
            alert(response['message']);
            window.location.reload(true);
            // let buttonCriar = row.find('button[id="criaProductBtn"]');
            // let buttonCancelar = row.find('button[id="cancelarProdutoBtn"]');
            // buttonCriar.text('Salvar');
            // buttonCriar.removeAttr('id');
            // buttonCancelar.text('Deletar');
            // buttonCancelar.removeAttr('id');
            // buttonCancelar.attr('id','deletBtn');
            // row.find('button.btn-outline-danger').removeClass('btn-outline-danger').addClass('btn-danger');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Erro ao criar produto');
        }
    });
}

function cancelaProduto(row){
    row.remove();
}