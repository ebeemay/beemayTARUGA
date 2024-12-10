<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfabeto em Português</title>
    <link rel="stylesheet" href="{{ asset('css/conteudoParte1.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    
       
    <!--Conteudo-->
    <div class="divTitulo">
        <h1>Vamos observar o alfabeto?</h1>
    </div>

    <div class="container">
        <div class="video-container">
            <div id="videoElement" class="video"><video src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/ABC_LP.mp4" controls poster="{{ asset('storage/app/public/Imgs/abcThumbLP.png')}}"></video></div>
        </div>
    </div>
    <div class="divButton">
        <button id="continueButton" data-status="15" data-materia="portugues" data-atividade="1">Continuar</button>
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
</body>
</html>