function ajustaTextareaHeight(id) {
    const textarea = document.getElementById(id);
    textarea.style.height = 'auto'; 
    if(textarea.scrollHeight > textarea.clientHeight){
        textarea.style.height = textarea.scrollHeight + 'px';  
    }
    console.log(textarea.clientHeight);
}