
async function preencheItens(){
    $.ajax({
        url: '/api/itens/', 
        method: 'GET', 
        success: function(response) {
            listaProdutos = response['data'];
            escreveProdutosPorCategoria(listaProdutos);
        },
        error: function(jqXHR, textStatus, errorThrown) {        
            alert(jqXHR.responseJSON.message);        
        }
    });
}

/**
 * Acrescenta os produtos por categorias na mensagem
 * @param array categorias 
 * @returns void
 */
async function escreveProdutosPorCategoria(categorias) {
    let textarea = document.getElementById('itens');
    if (typeof categorias == 'string') {
        textarea.innerHTML = categorias;
        return;
    }   
    
    // Limpa o conteúdo existente no textarea
    textarea.innerHTML = "";

    // Itera sobre cada categoria
    Object.entries(categorias).forEach(([categoriaNome, produtos]) => {
        // Adiciona o nome da categoria ao textarea
        textarea.innerHTML += `${categoriaNome}\n~\n`;

        // Itera sobre os produtos na categoria
        Object.entries(produtos).forEach(([produtoNome, produto]) => {
            // Adiciona detalhes do produto ao textarea
            textarea.innerHTML += `${produto.nome_produto} - ${produto.medida_produto} : ${produto.preco_produto}\n`;
        });

        // Adiciona uma linha em branco entre categorias
        textarea.innerHTML += "\n";
    });

    ajustaTextareaHeight('itens');
    preencheMenssagem();
}

function preencheMenssagem(){
    let textareaMensagem = document.getElementById('mensagem');
    let textareas = ['cabecalho', 'alertas', 'itens', 'comunicados', 'fechamento'];

    textareas.forEach(textarea => {
        textarea = document.getElementById(textarea);
        if (textarea.innerHTML != '' ) {
            textareaMensagem.innerHTML += `${textarea.innerHTML} \n`;
        }
    });
    ajustaTextareaHeight(textareaMensagem.id);

}

preencheItens();