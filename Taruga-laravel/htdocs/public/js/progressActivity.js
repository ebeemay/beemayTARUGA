document.getElementById('continueButton').addEventListener('click', function() {
    const button = this;
    const status = button.getAttribute('data-status'); // Status a ser atualizado
    const materia = button.getAttribute('data-materia'); // Matéria
    const numeroAtividade = button.getAttribute('data-atividade'); // Número da atividade

    // Envia a requisição AJAX
    axios.post('{{ route("progress.update") }}', {
        status: status,
        materia: materia,
        numeroAtividade: numeroAtividade
    })
    .then(response => {
        console.log(response.data.message);
        // Redirecionar para a próxima view ou exibir uma mensagem
        alert('Progresso atualizado! Redirecionando...');
        window.location.href = '/atividade/' + materia + '/' + numeroAtividade;
    })
    .catch(error => {
        console.error(error);
        alert('Erro ao atualizar o progresso.');
    });
});