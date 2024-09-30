@extends('master')

@section('content')
    <title>Página Não Encontrada - Naturaleza</title>
    <style>
        .container {
            max-width: 100%;
            padding: 0%;
        }

        .main {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #F2F7F1 0%, #f9ffff 40%, #a4ff98 60%, #27f727d7 80%); /* Degradê do off-white para o verde */
            color: #4E4E4E; /* Cinza escuro */
            margin: 0;
            padding: 10px 0px 0px 0px;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            text-align: center;
            width: 100%;
        }
        .code {
            font-family: 'Montserrat', sans-serif;
            color: #4e4c4c; /* Branco */
            font-size: 40px;
            margin-bottom: 10px;
        }
        .messagem_error {
            font-size: 22px;
            color: #4E4E4E; /* Cinza escuro */
            margin-bottom: 10px;
        }
        .home {
            display: inline-block;
            padding: 15px 30px;
            background-color: #FFAE42; /* Laranja */
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            border-radius: 50px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }
        .home:hover {
            background-color: #E09524; /* Laranja mais escuro */
        }
        .illustration {
            max-width: 400px;
            margin: 10px auto;
            border-radius: 20%;
        }
    </style>

<div class="main">
    <h1 class="code">404</h1>
    <p class="messagem_error">Desculpe, a página que você procura não foi encontrada.</p>
    <p class="messagem_error">Talvez você tenha digitado algo errado ou a página não exista mais.</p>
    <img src="{{ asset('imagens/coelho_404.png') }}" alt="Ilustração Naturaleza" class="illustration">
    <a class="home" href="/">Voltar para a Página Inicial</a>
</div>

@endsection
