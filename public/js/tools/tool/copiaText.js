function copyToClipboard() {
    
    let text = document.getElementById('mensagem');
    text.select();
    text.setSelectionRange(0, 99999);

    alert('Texto copiado!');
}