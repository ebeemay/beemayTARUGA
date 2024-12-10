<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo de Letras e Vídeos</title>
    <link rel="stylesheet" href="{{ asset('css/thirdScreen.css')}}?v={{ time() }}">
</head>

<body>
        <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
        <script>
          new window.VLibras.Widget('https://vlibras.gov.br/app');
        </script>
      <div class="divTitulo">
        <h1>Ache as letras!</h1>
    </div>
    <div class="container">
        <div class="game-container">
            <img class="background" src="../../Imgs/Bg_Game.png" alt="Imagem de fundo" class="background-image">
            <div class="letra" data-video="../../Videos/A.mp4">
                <img src="../../Imgs/aLibras.jpg" alt="Letra A">
            </div>
            <div class="letra" data-video="../../Videos/E.mp4">
                <img src="../../Imgs/eLibras.jpg" alt="Letra E">
            </div>
            <div class="letra" data-video="../../Videos/I.mp4">
                <img src="../../Imgs/iLibras.jpg" alt="Letra I">
            </div>
            <div class="letra" data-video="../../Videos/O.mp4">
                <img src="../../Imgs/oLibras.jpg" alt="Letra O">
            </div>
            <div class="letra" data-video="../../Videos/U.mp4">
                <img src="../../Imgs/uLibras.jpg" alt="Letra U">
            </div>
        </div>
    </div>
    <!-- Contêiner do vídeo -->
    <div class="video-container" id="video-container">
        <button class="close-btn" id="close-btn">&times;</button>
        <video id="video-player" controls></video>
    </div>

    <script src="{{ asset('js/miniGame.js')}}?v={{ time() }}"></script>
</body>

</html>