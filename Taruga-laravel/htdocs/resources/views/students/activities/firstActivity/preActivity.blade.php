<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost" />
    <title>Pré Atividade</title>
    <!--Css link-->
    <link rel="stylesheet" href="{{ asset('css/preActivity.css')}}?v={{ time() }}">
    <!--API link-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
</head>

<body>
       
<div class="seta">
        <a onclick="window.history.back()">
            <i class="iconSeta bi bi-arrow-left-circle-fill fs-1"></i>
        </a>
    </div>

    <div class="divTitulo">
        <h1>Colocando em prática</h1>
    </div>

    <main>

        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="project-img">
                        <img class="imgSlider" src="{{ asset('storage/app/public/Imgs/1.png') }}" alt="Foto 01">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="project-img">
                        <img class="imgSlider" src="{{ asset('storage/app/public/Imgs/2.png') }}" alt="Foto 02">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="project-img">
                        <img class="imgSlider" src="{{ asset('storage/app/public/Imgs/3.png') }}" alt="Foto 03">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="project-img">
                        <img class="imgSlider" src="{{ asset('storage/app/public/Imgs/4.png') }}" alt="Foto 03">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="project-img">
                        <img class="imgSlider" src="{{ asset('storage/app/public/Imgs/5.png') }}" alt="Foto 03">
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="project-img">
                        <img class="imgSlider" src="{{ asset('storage/app/public/Imgs/6.png') }}" alt="Foto 03">
                    </div>
                </div>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </main>
    <div class="divButton">
    <button id="continueButton" class="cssButtons" data-status="100" data-materia="libras" data-atividade="1">Continuar</button>
    </div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.getElementById('continueButton').addEventListener('click', function () {
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
    <script src="{{ asset('js/carroussel.js')}}?v={{ time() }}"></script>
</body>

</html>