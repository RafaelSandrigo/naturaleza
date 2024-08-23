function ajustaTextareaHeight(id) {
    const textarea = document.getElementById(id);
    textarea.style.height = 'auto'; // Reset height
    textarea.style.height = textarea.scrollHeight + 'px';
    
}