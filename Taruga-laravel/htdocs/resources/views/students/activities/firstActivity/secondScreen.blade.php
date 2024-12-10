<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost" />
    <title>Letras em Libras</title>
    <!--Css link-->
    <link rel="stylesheet" href=" {{ asset('css/secondScreen.css')}}?v={{ time() }}">
</head>

<body>

<div class="seta">
        <a onclick="window.history.back()">
            <i class="iconSeta bi bi-arrow-left-circle-fill fs-1"></i>
        </a>
    </div>
    
    <div class="divTitulo">
        <h1>Vamos agora observar as letras!</h1>
    </div>
    <div class="container">
        <div class="video-container">
            <div class="video"><video src="{{ asset('storage/app/public/Videos/A.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/B.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/C.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/D.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/E.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/F.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/G.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/H.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/I.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/J.mp4')}}"></video></div>

            <div class="video"><video src="{{ asset('storage/app/public/Videos/K.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/L.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/M.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/N.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/O.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/P.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/Q.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/R.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/S.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/T.mp4')}}"></video></div>

            <div class="video"><video src="{{ asset('storage/app/public/Videos/U.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/V.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/W.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/X.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/Y.mp4')}}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/Z.mp4')}}"></video></div>
        </div>
        <div class="popup-video">
            <span>&times;</span>
            <video src="{{ asset('storage/app/public/Videos/ZiggsTeste.mp4')}}" autoplay controls></video>
        </div>
    </div>
    <div class="divButton">
        <button id="backButton" class="cssButtons">Voltar</button>
        <button id="continueButton" class="cssButtons" data-status="30" data-materia="libras" data-atividade="1">Continuar</button>
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

    <script>
        /* document.querySelectorAll('.video-container video').forEach(vid => {
             vid.onclick = () => {
                 document.querySelector('.popup-video').style.display = 'block';
                 document.querySelector('.popup-video video').src = vid.getAttribute('src');
             }
         });
 
         document.querySelector('.popup-video span').onclick = () => {
            
             document.querySelector('.popup-video').style.display = 'none';
         }*/

        // Evento de clique nos vídeos da galeria
        document.querySelectorAll('.video-container video').forEach(vid => {
            vid.onclick = () => {
                const popup = document.querySelector('.popup-video');
                const popupVideo = popup.querySelector('video');

                // Defina a URL do vídeo do popup para o URL do vídeo clicado
                popupVideo.src = vid.getAttribute('src');

                // Exiba o popup
                popup.style.display = 'flex'; // Use 'flex' para centralizar o vídeo
                popupVideo.play(); // Inicie o vídeo
            }
        });

        // Evento de clique no botão de fechar
        document.querySelector('.popup-video span').onclick = () => {
            const popup = document.querySelector('.popup-video');
            const popupVideo = popup.querySelector('video');

            // Pause o vídeo
            popupVideo.pause();

            // Oculte o popup
            popup.style.display = 'none';
        }
    </script>
</body>

</html>