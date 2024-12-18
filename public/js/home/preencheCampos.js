async function buscaCabecalho(url) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: url, 
            method: 'GET', 
            data:{
                status: 'ativo',
            },
            success: function(response) {
                let campo = {};
                console.log(response);
                campo['success'] = response.success;
                campo['dados'] = (response.data != null) ? response.data : "Nenhum dado disponível";
                resolve(campo);  // Resolva a Promise com o resultado
            },
            error: function(jqXHR, textStatus, errorThrown) {
                reject(jqXHR.responseJSON.message);  // Rejeite a Promise em caso de erro
            }
        });
    });
}

/**
 * Função para preencher os textareas com base na Url de request e idTextarea informados 
 * @param {string} url Url da request
 * @param {string} idTextarea Id do textarea que será preenchido    
 * @returns {Number []} Retorna um Array com o success e os dados
 */
async function preencheCampos(url, idTextarea) {
    try {
        let dados = await buscaCabecalho(url);  // Aguarda a resolução da Promise
        console.log("Executando o campo: " + idTextarea);
        let textarea = document.getElementById(idTextarea);
        console.log(dados.dados);
        if (!dados.success || dados.dados === "Nenhum dado disponível" || dados.dados == []) {
            textarea.placeholder = "Nenhum dado disponível";    
            return false;
        }
        switch (idTextarea) {
            case 'cabecalho':
                textarea.innerHTML = dados.dados.texto_cabecalho;
                
                break;
            
            case "fechamento":
                textarea.innerHTML = dados.dados.texto_fechamento;
                break;
            default:
                textarea.innerHTML = dados.data;
                break;
        }

    } catch (error) {
        console.error("Erro ao preencher o", idTextarea,": ", error);
    }
}

preencheCampos('/api/cabecalho/ativo','cabecalho');
// preencheCampos('/api/alertas/status','alertas');
// preencheCampos('/api/comunicados/status','comunicados');
preencheCampos('/api/fechamentos/status','fechamento');
