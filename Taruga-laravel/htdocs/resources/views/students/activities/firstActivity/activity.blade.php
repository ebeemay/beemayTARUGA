<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/activity.css')}}?v={{ time() }}">
  <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost" />
  <script src="{{ asset('js/activity.js')}}?v={{ time() }}" defer></script>
  <title>Quiz Libras</title>
</head>

<body>
  
<div class="seta">
        <a onclick="window.history.back()">
            <i class="iconSeta bi bi-arrow-left-circle-fill fs-1"></i>
        </a>
    </div>
    
  <div class="container">
    <div class="containerGame">
      <div class="backGame">
        <!-- Aq -->
        <div class="questions-container hide">
          <div class="divTitulo">
            <span class="question">Pergunta aqui?</span>
          </div>
          <div class="answers-container">
          </div>
          <div class="divNextQuestion">
            <!-- Aq -->
            <button class="next-question button hide">Próxima pergunta</button>
            <!-- Aq -->
          </div>
        </div>
        <!-- Aq -->
        <div class="controls-container">
          <!-- Aq -->
          <div class="divStart-quiz">
            <button class="start-quiz button">Começar Atividade!</button>
          </div>
        </div>
      </div>
    </div>

    <div class="containerCheck">
      <div class="ccImg">
        <div class="containerImg">
          <img class="imagemCE mostrar" src="{{ asset('storage/app/public/Imgs/Duvida.png') }}" alt="">
          <img class="imagemCerta esconder" src="{{ asset('storage/app/public/Imgs/Certo.png') }}" alt="">
          <img class="imagemErrada esconder" src="{{ asset('storage/app/public/Imgs/Errado.png') }}" alt="">
          <img class="imagemCongratulations esconder" src="{{ asset('storage/app/public/Imgs/CongratulationGif.gif') }}" alt="">
        </div>
      </div>
      <div class="containerH1">
        <h1 id="tituloGato">Qual será a carta correta?</h1>
        <!--barra de progresso-->
        <div id="progress-container" class="esconder">
          <div id="progress-bar">
            <span id="progress-value"></span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const congratulationsRoute = "{{ route('congratulations') }}";
</script>
<script>
    const IMAGES = {
        aLibras: "{{ asset('storage/app/public/Imgs/aLibras.jpg') }}",
        cLibras: "{{ asset('storage/app/public/Imgs/cLibras.jpg') }}",
        bLibras: "{{ asset('storage/app/public/Imgs/bLibras.jpg') }}",
        fLibras: "{{ asset('storage/app/public/Imgs/fLibras.jpg') }}",
        gLibras: "{{ asset('storage/app/public/Imgs/gLibras.jpg') }}",
        eLibras: "{{ asset('storage/app/public/Imgs/eLibras.jpg') }}",
        hLibras: "{{ asset('storage/app/public/Imgs/hLibras.jpg') }}",
        kLibras: "{{ asset('storage/app/public/Imgs/kLibras.jpg') }}",
        iLibras: "{{ asset('storage/app/public/Imgs/iLibras.jpg') }}",
        jLibras: "{{ asset('storage/app/public/Imgs/jLibras.jpg') }}",
        lLibras: "{{ asset('storage/app/public/Imgs/lLibras.jpg') }}",
        mLibras: "{{ asset('storage/app/public/Imgs/mLibras.jpg') }}",
        nLibras: "{{ asset('storage/app/public/Imgs/nLibras.jpg') }}",
        oLibras: "{{ asset('storage/app/public/Imgs/oLibras.jpg') }}",
        qLibras: "{{ asset('storage/app/public/Imgs/qLibras.jpg') }}",
        pLibras: "{{ asset('storage/app/public/Imgs/pLibras.jpg') }}",
        tLibras: "{{ asset('storage/app/public/Imgs/tLibras.jpg') }}",
        sLibras: "{{ asset('storage/app/public/Imgs/sLibras.jpg') }}",
        rLibras: "{{ asset('storage/app/public/Imgs/rLibras.jpg') }}",
        vLibras: "{{ asset('storage/app/public/Imgs/vLibras.jpg') }}",
        wLibras: "{{ asset('storage/app/public/Imgs/wLibras.jpg') }}",
        uLibras: "{{ asset('storage/app/public/Imgs/uLibras.jpg') }}",
        xLibras: "{{ asset('storage/app/public/Imgs/xLibras.jpg') }}",
        zLibras: "{{ asset('storage/app/public/Imgs/zLibras.jpg') }}",
        yLibras: "{{ asset('storage/app/public/Imgs/yLibras.jpg') }}"
    };
</script>
</body>

</html>