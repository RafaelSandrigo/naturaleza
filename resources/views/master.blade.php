<style>
    /* Oculta o corpo da página inicialmente */
    body {
        display: none;
    }
</style>
<script>
    
    // Variáveis de configuração
    const correctLogin = "naturaleza"; // Substitua pelo login correto
    const correctPassword = "naturaleza@2024"; // Substitua pela senha correta
    const maxAttempts = 5;
    const blockDuration = 5 * 60 * 1000; // 5 minutos em milissegundos
    const sessionDuration = 15 * 24 * 1 * 60 * 60 * 1000; // 15 dias em milissegundos

    // Função principal para validar o login
    function validateLogin() {
        let attempts = parseInt(localStorage.getItem('loginAttempts')) || 0;
        let blockTime = parseInt(localStorage.getItem('blockTime')) || 0;
        const loginExpiration = parseInt(localStorage.getItem('loginExpiration')) || 0;

        // Verifica se o login está válido
        const currentTime = new Date().getTime();
        if (loginExpiration && currentTime < loginExpiration) {
            return true; // Login ainda válido
        }

        // Verifica se o usuário está bloqueado
        if (blockTime && currentTime < blockTime) {
            alert("Você está bloqueado. Tente novamente mais tarde.");
            return false; // Bloqueia o carregamento da página
        }

        // Resetar as tentativas se o tempo de bloqueio expirou
        if (currentTime >= blockTime) {
            localStorage.removeItem('blockTime');
            attempts = 0;
            localStorage.setItem('loginAttempts', attempts);
        }

        // Loop de validação até o login estar correto ou o usuário ser bloqueado
        while (attempts < maxAttempts) {
            const login = prompt("Digite o login:");
            const password = prompt("Digite a senha:");

            // Verifica se as credenciais estão corretas
            if (login === correctLogin && password === correctPassword) {
                alert("Login bem-sucedido!");

                // Armazena o horário de expiração do login (1 hora a partir de agora)
                localStorage.setItem('loginExpiration', currentTime + sessionDuration);

                return true; // Permite o carregamento da página
            } else {
                attempts++;
                localStorage.setItem('loginAttempts', attempts);
                alert(`Login ou senha incorretos. Tentativa ${attempts} de ${maxAttempts}.`);
            }

            // Verifica se as tentativas chegaram ao máximo permitido
            if (attempts >= maxAttempts) {
                blockTime = currentTime + blockDuration;
                localStorage.setItem('blockTime', blockTime);
                alert("Você foi bloqueado por 5 minutos devido a tentativas falhas.");
                location.reload(); // Recarrega a página
                return false; // Bloqueia o carregamento da página
            }
        }
    }

    // Função que inicializa a validação antes de carregar o conteúdo
    function initialize() {
        if (validateLogin()) {
            document.body.style.display = "block"; // Exibe o corpo da página se o login for bem-sucedido
        } else {
            document.body.innerHTML = "<h1>Acesso bloqueado ou sessão expirada</h1><p>Tente novamente mais tarde.</p>";
            document.body.style.display = "block"; // Exibe a mensagem de bloqueio ou expiração
        }
    }

    // Chama a função ao carregar o script, antes do onload
    document.addEventListener('DOMContentLoaded', initialize);
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/app.css">
    <title>{{$title}}</title>
</head>
<body>
    @include('partials.header')
    <div class="container">

        @yield('content')
    </div>
</body>
</html>