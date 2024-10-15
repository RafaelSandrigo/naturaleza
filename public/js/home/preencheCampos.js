async function buscaFechamento() {
    return new Promise(function(resolve, reject) {
        $.ajax({
            url: '/api/fechamentos/status?status=True', 
            method: 'GET', 
            success: function(response) {
                let fechamento = response['data'];
                resolve(fechamento);  // Resolve com os dados de 'fechamento'
            },
            error: function(jqXHR, textStatus, errorThrown) {
                reject(jqXHR.responseJSON.message);  // Rejeite a Promise em caso de erro
            }
        });
    });
}

async function preencheFechamento() {
    try {
        let textarea = document.getElementById('fechamento');
        let fechamento = await buscaFechamento();

        textarea.innerHTML = fechamento[0].texto_fechamento;

    } catch (error) {
        console.error("Erro ao preencher o fechamento: ", error);
    }
}


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

async function buscaCabecalho(){
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '/api/cabecalho/ativo', 
            method: 'GET', 
            success: function(response) {
                let cabecalho = response['data'];
                resolve(cabecalho);  // Resolva a Promise com o resultado
            },
            error: function(jqXHR, textStatus, errorThrown) {
                reject(jqXHR.responseJSON.message);  // Rejeite a Promise em caso de erro
            }
        });
    });
}

async function preencheCabecalho() {
    try {
        let textarea = document.getElementById('cabecalho');
        let cabecalho = await buscaCabecalho(); // Use await para aguardar o retorno
        textarea.innerHTML = cabecalho.texto_cabecalho;  // Substitui o conteúdo do textarea

        ajustaTextareaHeight(textarea.id);  // Chama função para ajustar a altura do textarea
    } catch (error) {
        alert(error);  // Exibe o erro, se houver
    }
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
preencheCabecalho();
preencheFechamento();