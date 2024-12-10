<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instruções Atividade de Letras e Figuras!</title>
    <!--Css link-->
    <link rel="stylesheet" href="{{ asset('css/atividadeParte1.css') }}">
    <!--API link-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    
    <div class="divTitulo">
        <h1>Jogos e Brincadeiras</h1>
    </div>
    <main>
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="project-img">
                        <img class="imgSlider" src="{{ asset('storage/app/public/Imgs/instruçõesAtividade1.png') }}" alt="Foto 01">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="project-img">
                        <img class="imgSlider" src="{{ asset('storage/app/public/Imgs/instruçõesAtividade2.png') }}" alt="Foto 02">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="project-img">
                        <img class="imgSlider" src="{{ asset('storage/app/public/Imgs/instruçõesAtividade3.png') }}" alt="Foto 03">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="project-img">
                        <img class="imgSlider" src="{{ asset('storage/app/public/Imgs/instruçõesAtividade4.png') }}" alt="Foto 04">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="project-img">
                        <img class="imgSlider" src="{{ asset('storage/app/public/Imgs/instruçõesAtividade5.png') }}" alt="Foto 05">
                    </div>
                </div>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </main>
    <div class="divButton">
    <button id="continueButton" class="cssButtons"  data-status="100" data-materia="portugues" data-atividade="1">Continuar</button>
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
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/carroussel.js') }}"></script>
</body>

</html>