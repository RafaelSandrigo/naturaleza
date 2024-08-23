// /**
//   @param {string|Array} campos - Identificador dos campos que serão utilizados, pode ser um único valor ou um array, dependendo do tipo de identificação.
//   @param {string} type - Nome do evento que acionará a função, exemplo 'click'.
//   @param {function} funcs - Função que será adicionada no campo.
//   @param {string} identifier - Tipo da identificação, respostas possíveis: 'id', 'class', 'tag', 'name'.
//   @return {void}
// */
// function tools(campos, type = 'click', funcs, identifier){
//     if (typeof funcs !== 'function') {
//         console.error('O parâmetro funcs deve ser uma função.');
//         return;
//     }

//     switch (identifier) {
//         case 'id':
//             const campo = document.getElementById(campos);
//             if (campo) {
//                 campo.addEventListener(type, funcs);
//             } else {
//                 console.error(`Elemento com ID ${campos} não encontrado.`);
//             }
//             break;

//         case 'class':
//             const elementosClass = document.getElementsByClassName(campos);
//             for (let elemento of elementosClass) {
//                 elemento.addEventListener(type, funcs);
//             }
//             break;

//         case 'name':
//             const elementosName = document.getElementsByName(campos);
//             for (let elemento of elementosName) {
//                 elemento.addEventListener(type, funcs);
//             }
//             break;

//         case 'tag':
//             const elementosTag = document.getElementsByTagName(campos);
//             for (let elemento of elementosTag) {
//                 elemento.addEventListener(type, funcs);
//             }
//             break;

//         default:
//             console.error('Identificador inválido. Use "id", "class", "name", ou "tag".');
//             break;
//     }
// }
/**
  @param {string|Array} campos - Identificador dos campos que serão utilizados, pode ser um único valor ou um array, dependendo do tipo de identificação.
  @param {string} type - Nome do evento que acionará a função, exemplo 'click'.
  @param {function} funcs - Função que será adicionada no campo.
  @param {string} identifier - Tipo da identificação, respostas possíveis: 'id', 'class', 'tag', 'name'.
  @return {void}
*/
function tools(campos, type, funcs, identifier){
    if (typeof funcs !== 'function') {
        console.error('O parâmetro funcs deve ser uma função.');
        return;
    }

    switch (identifier) {
        case 'id':
            const campo = document.getElementById(campos);
            if (campo) {
                campo.addEventListener(type, funcs);
            } else {
                console.error(`Elemento com ID ${campos} não encontrado.`);
            }
            break;

        case 'class':
            const elementosClass = document.getElementsByClassName(campos);
            for (let elemento of elementosClass) {
                elemento.addEventListener(type, funcs);
            }
            break;

        case 'name':
            const elementosName = document.getElementsByName(campos);
            for (let elemento of elementosName) {
                elemento.addEventListener(type, funcs);
            }
            break;

        case 'tag':
            const elementosTag = document.getElementsByTagName(campos);
            for (let elemento of elementosTag) {
                elemento.addEventListener(type, funcs);
            }
            break;

        default:
            console.error('Identificador inválido. Use "id", "class", "name", ou "tag".');
            break;
    }
}
