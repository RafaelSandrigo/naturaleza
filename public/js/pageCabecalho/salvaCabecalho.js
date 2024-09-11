$(document).ready(function() {
     $('.save-btn').click(function() {
                let row = $(this).closest('tr');
                let nome_cabecalho = row.find('input[name="nome_cabecalho"]').val();

                let token = $('input[name="_token"]').val();
                $.ajax({
                url: '/api/cabecalhos/', // URL para o recurso específico
                method: 'POST', // Tipo de requisição
                contentType: 'application/json', // Tipo de dados sendo enviados
                data: JSON.stringify({
                    _token: token, // Token CSRF

                    ordem: 'asc',
                }), // Dados no corpo da requisição
                success: function(response) {
                    // console.log('Resposta do servidor:', response);
                    alert(response['message']);
                    // Opcional: Atualizar a interface ou exibir uma mensagem
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // console.log('Erro:', textStatus, errorThrown);
                    alert(response['message']);
                    // Opcional: Exibir uma mensagem de erro para o usuário
                }
                });
    })
}); 