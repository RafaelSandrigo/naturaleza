function copyToClipboard(input = 'mensagemCopia') {
    
    let text = (input == 'mensagemCopia') ? document.getElementById(text) : input;
    text.select();
    text.setSelectionRange(0, 99999);

    alert('Texto copiado!');
}