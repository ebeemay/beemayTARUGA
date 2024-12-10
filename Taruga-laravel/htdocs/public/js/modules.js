document.querySelectorAll('.atividade').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Evita a navegação padrão
            const materia = this.dataset.materia;
            const numeroAtividade = this.dataset.numero;
    
            // Chamada AJAX para obter o progresso
            fetch(`/progress/${materia}/${numeroAtividade}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Redireciona para a view correspondente
                        window.location.href = `/atividade/${data.data.view}`;
                    } else {
                        alert('Erro ao carregar o progresso!');
                    }
                })
                .catch(error => console.error('Erro:', error));
        });
    });