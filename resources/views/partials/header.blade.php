<style>

    /* Estilo para exibir o dropdown ao passar o mouse */
    .navbar-nav .dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0; /* Remove o delay entre hover e exibição */
    }
</style>
<link rel="stylesheet" href="{{ asset('css/layout/header.css') }}">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">Naturaleza</a>

    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('produtos') }}">Produtos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categorias') }}">Categorias</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="modulosDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Módulos
                </a>
                <ul class="dropdown-menu" aria-labelledby="modulosDropdown">
                    {{-- <li><a class="dropdown-item" href="{{route('cabecalhos')}}">Alertas</a></li> --}}
                    <li><a class="dropdown-item" href="{{route('cabecalhos')}}">Cabeçalho</a></li>
                    {{-- <li><a class="dropdown-item" href="{{route('cabecalhos')}}">Comunicados</a></li> --}}
                    {{-- <li><a class="dropdown-item" href="{{route('cabecalhos')}}">Fechamento</a></li> --}}
                </ul>
            </li>

        </ul>
        {{-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> --}}
    </div>
</nav>


{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Meu Projeto</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <!-- Item de menu com Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="modulosDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Módulos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="modulosDropdown">
                        <li><a class="dropdown-item" href="#cabecalho">Cabeçalho</a></li>
                        <li><a class="dropdown-item" href="#comunicados">Comunicados</a></li>
                        <li><a class="dropdown-item" href="#fechamento">Fechamento</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}
