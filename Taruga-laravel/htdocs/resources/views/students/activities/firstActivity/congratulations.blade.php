<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('css/congratulations.css')}}?v={{ time() }}">
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost" />

    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Parabéns!</title>


</head>

<body>
       
 <div class="seta">
        <a onclick="window.history.back()">
            <i class="iconSeta bi bi-arrow-left-circle-fill fs-1"></i>
        </a>
    </div>

    <div class="divCentralizaElementos">
        <div class="containerTrofeu">
            <img class="imgTrofeu" src="../../Imgs/TrofeuImg.gif" alt="TroféuImg">
        </div>
    </div>
    <div class="divButton">
    <a href="{{ route('Modules') }}">
        <button id="continueButton" class="cssButtons">Continuar</button>
    </a>
    </div>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <script src="{{ asset('js/congratulations.js')}}?v={{ time() }}"></script>
</body>
</html>