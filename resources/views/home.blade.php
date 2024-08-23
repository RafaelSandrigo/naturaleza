@extends('master')
@section('content')
<style>
    body{
        /* background-color: #333; */
    }
    .textarea-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
        /* background-image: url(https://static.whatsapp.net/rsrc.php/v3/yl/r/gi_DckOUM5a.png); */
    }
    .textarea-container textarea {
        width: 100%;
        max-width: 600px;
        margin: 15px 0;
        background-color: #f0f0f0;
        border: 1px solid #84c22d;
        font-size: 1rem;
        font-weight: bolder;
        resize: none;
        overflow-y: auto; 
        max-height: 400px; 
        padding: 20px;
        border-radius: 12px;
    }
    .textarea-container textarea::-webkit-scrollbar-track {
        background: #cacaca;
        border-radius: 0px 12px 12px 0px;
    }
    .textarea-container textarea::-webkit-scrollbar-thumb {
        background-color: #888; 
        border-radius: 0px 12px 12px 0px; 
    }
    .textarea-container textarea::-webkit-scrollbar {
        width: 12px; 
    }
    .textarea-container textarea::-webkit-scrollbar-thumb:hover {
        background-color: #555; 
    }
    .copy-btn {
        margin: 10px 0;
        padding: 10px 20px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .copy-btn:hover {
        background-color: #218838;
    }
    h4 {
        margin-top: 25px;
        color: #333;
    }
</style>

<div class="container textarea-container">
    <h4 class="card-title">Mensagem</h4>
    <textarea name="" id="mensagem" readonly placeholder="Carregando..."></textarea>
    <button class="copy-btn" onclick="copyToClipboard()">Copiar</button> <!-- Botão de Copiar -->

    <h4 class="card-title">Cabeçalho</h4>
    <textarea class="form-control" id="cabecalho" readonly placeholder="Carregando..."></textarea>

    <h4 class="card-title">Mensagem de alerta</h4>
    <textarea class="form-control" id="alertas" readonly placeholder="Carregando..."></textarea>

    <h4 class="card-title">ITENS</h4>
    <textarea class="form-control" id="itens" readonly placeholder="Carregando..."></textarea>

    <h4 class="card-title">Comunicados</h4>
    <textarea class="form-control" id="comunicados" readonly placeholder="Carregando..."></textarea>

    <h4 class="card-title">Fechamento</h4>
    <textarea class="form-control" id="fechamento" readonly placeholder="Carregando..."></textarea>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{asset("js/formatting/fields/textarea.js")}}"></script> 
<script src="{{asset("js/home/preencheCampos.js")}}"></script> 
<script src="{{asset("js/tools/tool/copiaText.js")}}"></script> 
@endsection
