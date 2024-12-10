<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo dos Pares!</title>
    <link rel="stylesheet" href="{{ asset('css/jogoParte2.css') }}?v={{ time() }}">
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="divTitulo">
        <h1>Forme pares! Ligue a letra à figura que começa com ela!</h1>
    </div>
    <div class="containerGeral">
        <div class="containerJogo">
            <div class="containerparesContainer">
                <div class="paresContainer">
                    <div class="card" data-pair="A">
                        <img src="{{ asset('storage/app/public/Imgs/aLP.png') }}" alt="Letra A" />
                    </div>
                    <div class="card" data-pair="B">
                        <img src="{{ asset('storage/app/public/Imgs/bananaLP.png') }}" alt="Imagem Banana = letra B" />
                    </div>
                </div>
                <div class="paresContainer">
                    <div class="card" data-pair="C">
                        <img src="{{ asset('storage/app/public/Imgs/cLP.png') }}" alt="Letra C" />
                    </div>
                    <div class="card" data-pair="D">
                        <img src="{{ asset('storage/app/public/Imgs/dLP.png') }}" alt="Letra D" />
                    </div>
                </div>
            </div>
            <div class="containerparesContainer">
                <div class="paresContainer">
                    <div class="card" data-pair="B">
                        <img src="{{ asset('storage/app/public/Imgs/bLP.png') }}" alt="Letra B" />
                    </div>
                    <div class="card" data-pair="C">
                        <img src="{{ asset('storage/app/public/Imgs/casaLP.png') }}" alt="Imagem Casa = letra C" />
                    </div>
                </div>
                <div class="paresContainer">
                    <div class="card" data-pair="D">
                        <img src="{{ asset('storage/app/public/Imgs/dinossauroLP.png') }}" alt="Imagem Dinossauro = letra D" />
                    </div>
                    <div class="card" data-pair="A">
                        <img src="{{ asset('storage/app/public/Imgs/abelhaLP.png') }}" alt="Imagem Abelha = letra A" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="popup" class="popup hidden">
        <div class="popup-content">
            <img src="{{ asset('storage/app/public/Imgs/CongratulationGif.gif') }}" alt="Parabéns_Gatito">
            <button id="continueButton" class="cssButtons"  data-status="75" data-materia="portugues" data-atividade="1">Concluir</button>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.getElementById('continueButton').addEventListener('click', function () {
        const button = this;
        const status = button.getAttribute('data-status'); // Status a ser atualizado
        const materia = button.getAttribute('data-materia'); // Matéria
        const numeroAtividade = button.getAttribute('data-atividade'); // Número da atividade

        // Envia a requisição AJAX
        axios.post('{{ route("progress.updatePt") }}', {
            status: status,
            materia: materia,
            numeroAtividade: numeroAtividade
        })
        .then(response => {
            console.log(response.data.message);
            // Redirecionar para a próxima view com a URL retornada
            window.location.href = response.data.next_url;
        })
        .catch(error => {
            console.error(error);
            alert('Erro ao atualizar o progresso.');
        });
    });
</script>
    <script>
        //Game:
        let firstCard = null;
        const container = document.querySelector('.containerJogo');

        function disableInteractions() {
            container.style.pointerEvents = 'none'; // Desativa interações
        }

        function enableInteractions() {
            container.style.pointerEvents = 'auto'; // Reativa interações
        }

        function checkWin() {
            const allCards = document.querySelectorAll('.card');
            const allCorrect = Array.from(allCards).every(card => card.classList.contains('correct'));

            if (allCorrect) {
                //Mostrar popup
                const popup = document.getElementById('popup');
                popup.classList.add('show'); 
            }
        }

        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('click', () => {
                if (card.classList.contains('correct') || card.classList.contains('wrong') || card.classList.contains('selected')) return;

                card.classList.add('selected');
                card.style.borderColor = 'yellow';

                if (!firstCard) {
                    firstCard = card;
                } else {
                    const secondCard = card;

                    if (firstCard === secondCard) {
                        return; // Mesma carta clicada
                    }

                    disableInteractions(); // Desativa interações

                    if (firstCard.dataset.pair === secondCard.dataset.pair) {
                        // Par correto
                        firstCard.classList.add('correct');
                        secondCard.classList.add('correct');
                        firstCard.style.borderColor = 'green';
                        secondCard.style.borderColor = 'green';
                        setTimeout(() => {
                            firstCard = null;
                            enableInteractions();
                            checkWin();
                        }, 500);
                    } else {
                        // Par errado
                        firstCard.classList.add('wrong');
                        secondCard.classList.add('wrong');
                        firstCard.style.borderColor = 'red';
                        secondCard.style.borderColor = 'red';
                        setTimeout(() => {
                            firstCard.classList.remove('selected', 'wrong');
                            secondCard.classList.remove('selected', 'wrong');
                            firstCard.style.borderColor = 'white';
                            secondCard.style.borderColor = 'white';
                            firstCard = null;
                            enableInteractions();
                        }, 1000);
                    }
                }
            });
        });
    </script>
</body>

</html>