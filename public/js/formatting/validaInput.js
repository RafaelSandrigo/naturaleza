function validarCampos(row) {
    var camposPreenchidos = true;
    var mensagemErro = "";

    // Verifica o status
    var status_produto = row.find('input[name="status_produto"]');
    (!status_produto.prop('checked')) ? status_produto = 'n' : status_produto = 's'; 

    // Verifica o nome do produto
    var nome_produto = row.find('input[name="nome_produto"]').val().trim();
    if (nome_produto === "") {
        camposPreenchidos = false;
        mensagemErro += "Nome do produto não preenchido.\n";
    }

    // Verifica o preço do produto
    var preco_produto = row.find('input[name="preco_produto"]').val().trim();
    if (preco_produto === "" || isNaN(parseFloat(preco_produto.replace(',', '.')))) {
        camposPreenchidos = false;
        mensagemErro += "Preço do produto inválido.\n";
    }

    // Verifica a categoria do produto
    var categoria_produto = row.find('select[name="categoria_produto"]').val();
    if (!categoria_produto) {
        camposPreenchidos = false;
        mensagemErro += "Categoria do produto não selecionada.\n";
    }

    // Verifica a medida do produto
    var medida_produto = row.find('input[name="medida_produto"]').val().trim();
    if (medida_produto === "") {
        camposPreenchidos = false;
        mensagemErro += "Medida do produto não preenchida.\n";
    }

    if (!camposPreenchidos) {
        alert(mensagemErro);
    }

    return camposPreenchidos;
}