@extends('master')

@section('content')
<div style="background: linear-gradient(to right, #f0f0f0, #d9e6c4); padding: 50px; text-align: center;">
    <h1 style="color: #4A7C24;">Oops! Algo deu errado.</h1>
    <h2 style="color: #8B5B29;">Erro: {{ $title ?? 'Erro Desconhecido' }}</h2>
    <p style="font-size: 18px; color: #555;">
        Pedimos desculpas pela inconveniência. Estamos trabalhando para resolver o problema.
    </p>
    <p style="font-size: 16px; color: #555;">
        Enquanto isso, você pode voltar à <a href="{{ url('/') }}" style="color: #4A7C24; font-weight: bold;">página inicial</a> ou tentar outra ação.
    </p>
</div>
@endsection