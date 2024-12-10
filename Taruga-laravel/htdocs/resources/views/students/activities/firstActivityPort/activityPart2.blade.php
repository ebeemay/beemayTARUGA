<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade de Letras e Figuras!</title>
    <link rel="stylesheet" href="{{ asset('css/jogoParte2.css')}}?v={{ time() }}">
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Qual das figuras começa com a letra: <span id="letra-atual">A</span></h1>
        <div class="cards" id="cards-container">
            <!-- As cartas serão carregadas dinamicamente -->
        </div>
        <p id="feedback"></p>
        <button id="btn-continuar" onclick="proximaRodada()" style="display: none;">Continuar</button>
    </div>

    <script>
        // Controle de rodadas
        let rodadaAtual = 0;
        let audioAtual = null; // Variável para controlar o áudio atual
        let cartaSelecionada = null; // Variável para controlar a carta selecionada

        // Dados para cada rodada
        const rodadas = [
            {
                letra: "A",
                cartas: [
                    { nome: "abelha", correto: true, imagem: "{{ asset('storage/app/public/Imgs/abelhaLP.png') }}" },
                    { nome: "banana", correto: false, imagem: "{{ asset('storage/app/public/Imgs/bananaLP.png') }}" },
                    { nome: "casa", correto: false, imagem: "{{ asset('storage/app/public/Imgs/casaLP.png') }}" },
                ],
            },
            {
                letra: "E",
                cartas: [
                    { nome: "elefante", correto: true, imagem: "{{ asset('storage/app/public/Imgs/elefanteLP.png') }}" },
                    { nome: "navio", correto: false, imagem: "{{ asset('storage/app/public/Imgs/navioLP.png') }}" },
                    { nome: "dinossauro", correto: false, imagem: "{{ asset('storage/app/public/Imgs/dinossauroLP.png') }}" },
                ],
            },
            {
                letra: "V",
                cartas: [
                    { nome: "kiwi", correto: false, imagem: "{{ asset('storage/app/public/Imgs/kiwiLP.png') }}" },
                    { nome: "yoga", correto: false, imagem: "{{ asset('storage/app/public/Imgs/yogaLP.png') }}" },
                    { nome: "vaca", correto: true, imagem: "{{ asset('storage/app/public/Imgs/vacaLP.png') }}" },
                ],
            },
            {
                letra: "') }}",
                cartas: [
                    { nome: "queijo", correto: false, imagem: "{{ asset('storage/app/public/Imgs/queijoLP.png') }}" },
                    { nome: "wafer", correto: false, imagem: "{{ asset('storage/app/public/Imgs/waferLP.png') }}" },
                    { nome: "gato", correto: true, imagem: "{{ asset('storage/app/public/Imgs/gatoLP.png') }}" },
                ],
            },
            {
                letra: "L",
                cartas: [
                    { nome: "zebra", correto: false, imagem: "{{ asset('storage/app/public/Imgs/zebraLP.png') }}" },
                    { nome: "leao", correto: true, imagem: "{{ asset('storage/app/public/Imgs/leaoLP.png') }}" },
                    { nome: "ilha", correto: false, imagem: "{{ asset('storage/app/public/Imgs/ilhaLP.png') }}" },
                ],
            },
            {
                letra: "T",
                cartas: [
                    { nome: "pato", correto: false, imagem: "{{ asset('storage/app/public/Imgs/patoLP.png') }}" },
                    { nome: "tartaruga", correto: true, imagem: "{{ asset('storage/app/public/Imgs/tartarugaLP.png') }}" },
                    { nome: "sol", correto: false, imagem: "{{ asset('storage/app/public/Imgs/solLP.png') }}" },
                ],
            },
            {
                letra: "J",
                cartas: [
                    { nome: "jacare", correto: true, imagem: "{{ asset('storage/app/public/Imgs/jacareLP.png') }}" },
                    { nome: "xilofone", correto: false, imagem: "{{ asset('storage/app/public/Imgs/xilofoneLP.png') }}" },
                    { nome: "hora", correto: false, imagem: "{{ asset('storage/app/public/Imgs/horaLP.png') }}" },
                ],
            },
            {
                letra: "R",
                cartas: [
                    { nome: "robo", correto: true, imagem: "{{ asset('storage/app/public/Imgs/roboLP.png') }}" },
                    { nome: "macaco", correto: false, imagem: "{{ asset('storage/app/public/Imgs/macacoLP.png') }}" },
                    { nome: "ovo", correto: false, imagem: "{{ asset('storage/app/public/Imgs/ovoLP.png') }}" },
                ],
            },
            {
                letra: "F",
                cartas: [
                    { nome: "abelha", correto: false, imagem: "{{ asset('storage/app/public/Imgs/abelhaLP.png') }}" },
                    { nome: "uva", correto: false, imagem: "{{ asset('storage/app/public/Imgs/uvaLP.png') }}" },
                    { nome: "feijao", correto: true, imagem: "{{ asset('storage/app/public/Imgs/feijaoLP.png') }}" },
                ],
            }
            // Mais rodadas podem ser adicionadas
        ];

        // Inicializa a primeira rodada
        document.addEventListener("DOMContentLoaded", () => {
            carregarRodada();
        });

        // Carrega a rodada atual
        function carregarRodada() {
            const letraAtual = document.getElementById("letra-atual");
            const cardsContainer = document.getElementById("cards-container");

            // Verifica se há rodadas restantes
            if (rodadaAtual < rodadas.length) {
                const rodada = rodadas[rodadaAtual];
                letraAtual.textContent = rodada.letra;

                // Renderiza as cartas
                cardsContainer.innerHTML = rodada.cartas
                    .map(
                        (carta) => `
                        <div class="card" onclick="playSound('${carta.nome}', this)" data-correto="${carta.correto}">
                            <img src="${carta.imagem}" alt="${carta.nome}" class="card-im">
                            <button class="select-btn">Selecionar</button>
                        </div>
                    `
                    )
                    .join("");

                rodadaAtual++;
                // Reabilita o hover dos cards (caso a rodada tenha terminado)
                const cards = document.querySelectorAll(".card");
                cards.forEach(card => card.classList.remove('card-disabled'));
                const buttons = document.querySelectorAll(".select-btn");
                buttons.forEach(button => button.classList.remove('button-disabled'));
            } else {
                // Se não tiver mais rodadas, redireciona para outra página
                window.location.href = "{{ route('ModulesPt') }}";
            }
        }

        // Toca o som da carta
        function playSound(name, cardElement) {
            // Verifica se o áudio atual está tocando
            if (audioAtual && !audioAtual.paused) {
                audioAtual.pause(); // Se estiver tocando, pausa o áudio
                audioAtual.currentTime = 0; // Reseta a posição do áudio
            }

            // Carrega o novo áudio
            audioAtual = new Audio(`{{ asset('storage/app/public/Imgs/${name}.mp3') }}`);
            audioAtual.volume = 0.1; // Volume reduzido

            // Toca o áudio
            audioAtual.play();

            // Registra a carta selecionada para verificar posteriormente
            cartaSelecionada = cardElement;
        }

        // Seleciona a carta e verifica a resposta
        function verificarResposta() {
            if (!cartaSelecionada) return; // Evita que nada aconteça se nenhuma carta foi selecionada

            const cards = document.querySelectorAll(".card");
            const correto = cartaSelecionada.getAttribute("data-correto") === "true";
            const feedback = document.getElementById("feedback");
            const btnContinuar = document.getElementById("btn-continuar");

            // Marca todas as cartas como selecionadas e desabilita cliques
            cards.forEach((card) => {
                card.classList.add("selecionada");
                card.onclick = null; // Bloqueia cliques após a seleção
                const isCorreto = card.getAttribute("data-correto") === "true";
                card.style.borderColor = isCorreto ? "green" : "red";
            });

            // Desativa o hover dos cards e botões quando a resposta estiver correta
            if (correto) {
                cards.forEach(card => card.classList.add('card-disabled')); // Desabilita o hover dos cards
                const buttons = document.querySelectorAll(".select-btn");
                buttons.forEach(button => button.classList.add('button-disabled')); // Desabilita o hover dos botões
            }

            // Exibe feedback sobre a resposta
            feedback.textContent = correto ? "Correto! Clique em 'Continuar'." : "Errado! Clique em 'Continuar'.";
            feedback.style.color = correto ? "green" : "red";
            btnContinuar.style.display = "inline-block"; // Exibe o botão para continuar
        }

        // Passa para a próxima rodada
        // Passa para a próxima rodada
        function proximaRodada() {
            const feedback = document.getElementById("feedback");
            const btnContinuar = document.getElementById("btn-continuar");

            // Pausa o áudio atual se ele estiver tocando
            if (audioAtual) {
                audioAtual.pause();
                audioAtual.currentTime = 0; // Reseta a posição do áudio
            }

            feedback.textContent = "";
            btnContinuar.style.display = "none";
            carregarRodada();
        }


        // Adiciona a lógica de clique no botão de selecionar
        document.addEventListener('click', function (event) {
            if (event.target && event.target.classList.contains('select-btn')) {
                verificarResposta();
            }
        });
    </script>
</body>

</html>