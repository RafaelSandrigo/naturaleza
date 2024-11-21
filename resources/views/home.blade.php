@extends('master')
@section('content')
<link rel="stylesheet" href="{{ asset('css/layout/home.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container-fluid">
    <div class="row">
        <!-- Tabela na lateral -->
        <div class="col-md-2 bg-light p-3 position-fixed lateral-scroll">
            <table class="table">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                </tbody>
            </table>
        </div>

        <!-- Conteúdo principal -->
        <div class="col-md-10 offset-md-2 p-3">
            <div class="textarea-container">
                <h4 class="card-title">Mensagem</h4>
                <textarea name="" id="mensagem" readonly placeholder="Carregando...">
Lista de produtos orgânicos e agroecológicos certificados.
# DIRETO PRODUTOR #
Pedidos até segunda-feira, às 12 horas!
Entregas TERÇA-FEIRA, das 17 às 19 horas!

</textarea>
                <button class="copy-btn" onclick="copyToClipboard()">Copiar</button>

                <h4 class="card-title">Cabeçalho</h4>
                <textarea class="form-control" id="cabecalho" readonly placeholder="Carregando..."></textarea>

                {{-- <h4 class="card-title">Mensagem de alerta</h4>
                <textarea class="form-control" id="alertas" readonly placeholder="Carregando..."></textarea> --}}

                <h4 class="card-title">ITENS</h4>
                <textarea class="form-control" id="itens" readonly placeholder="Carregando..."></textarea>

                {{-- <h4 class="card-title">Comunicados</h4>
                <textarea class="form-control" id="comunicados" readonly placeholder="Carregando..."></textarea> --}}

                <h4 class="card-title">Fechamento</h4>
                <textarea class="form-control" id="fechamento" readonly placeholder="Carregando..."></textarea>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ asset('js/formatting/fields/textarea.js') }}"></script>
<script src="{{ asset('js/home/preencheCampos.js') }}"></script>
<script src="{{ asset('js/home/preencheMensagem.js') }}"></script>
<script src="{{ asset('js/home/listaProdutos.js') }}"></script>
<script src="{{ asset('js/tools/tool/copiaText.js') }}"></script>

@endsection
