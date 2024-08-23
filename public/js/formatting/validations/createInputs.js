function nomeProduto(nome_produto) {
    if (nome_produto === "") {
        camposPreenchidos = false;
        mensagemErro += "Nome do produto não preenchido.\n";
    }
}

function medidaProduto(medida_produto) {
    if (medida_produto === "") {
        camposPreenchidos = false;
        mensagemErro += "Medida do produto não preenchida.\n";
    }
}

function statusProduto(status_produto){
    !status_produto.prop('checked') ? (camposPreenchidos = false, mensagemErro += "Status do produto não selecionado.\n") : null;
}

function precoProduto(preco_produto){
    if (preco_produto === "" || isNaN(parseFloat(preco_produto.replace(',', '.')))) {
        camposPreenchidos = false;
        mensagemErro += "Preço do produto inválido.\n";
    }
}

function categoriaProduto(categoria_produto){
    if (!categoria_produto) {
        camposPreenchidos = false;
        mensagemErro += "Categoria do produto não selecionada.\n";
    }
}