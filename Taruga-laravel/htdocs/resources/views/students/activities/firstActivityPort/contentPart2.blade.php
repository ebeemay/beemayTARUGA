<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Letras em Português</title>
    <!--Css link-->
    <link rel="stylesheet" href="{{ asset('css/conteudoParte2.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
   
    <!--Conteudo-->
    <div class="divTitulo">
        <h1>Vamos agora observar as letras e suas figuras!</h1>
    </div>
    <div class="container">
        <div class="video-container">
            <div class="video"><video src="{{ asset('storage/app/public/Videos/A_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/aThumbLP.png') }}"></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/B_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/bThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/C_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/cThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/D_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/dThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/E_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/eThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/F_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/fThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/G_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/gThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/H_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/hThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/I_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/iThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/J_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/jThumbLP.png') }}"></video>></video></div>

            <div class="video"><video src="{{ asset('storage/app/public/Videos/K_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/kThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/L_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/lThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/M_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/mThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/N_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/nThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/O_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/oThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/P_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/pThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/Q_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/qThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/R_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/rThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/S_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/sThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/T_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/tThumbLP.png') }}"></video>></video></div>

            <div class="video"><video src="{{ asset('storage/app/public/Videos/U_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/uThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/V_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/vThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/W_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/wThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/X_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/xThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/Y_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/yThumbLP.png') }}"></video>></video></div>
            <div class="video"><video src="{{ asset('storage/app/public/Videos/Z_LP.mp4') }}" controls poster="{{ asset('storage/app/public/Imgs/zThumbLP.png') }}"></video>></video></div>
        </div>
        <div class="popup-video">
            <span>&times;</span>
            <video src="{{ asset('storage/app/public/Videos/Z_LP.mp4') }}" autoplay controls></video>
        </div>
    </div>
    <div class="divButton">
        <button id="backButton" class="cssButtons">Voltar</button>
        <button id="continueButton" class="cssButtons"  data-status="30" data-materia="portugues" data-atividade="1">Continuar</button>
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