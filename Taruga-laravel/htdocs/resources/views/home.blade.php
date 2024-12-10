<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo ao TARUGA!</title>
    <!-- CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href=" {{ asset('css/home.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body>
    <div id="container1" class="container1">
        <!-- Div Esquerda -->
        <div class="esquerda">
            <img id="animated" class="animatedBackInDown" src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/Imgs/TarugaBemVindos.png" alt="Sejam bem-vindos ao Taruga!">
            <div class="alignButton animatedBackInDown">
               
            <a href="{{ route('identification') }}" method="GET">
                <button class="buttonStyle">Entrar</button>
            </a>

            </div>
        </div>
        <!-- Div Direita -->
        <div class="direita">
            <img class="animatedBackInDown" src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/Imgs/Pingu.gif" alt="Animação de um pinguim dançando">
        </div>

        <!-- Div Seta -->
        <div class="seta d-flex justify-content-center align-items-center" id="scrollArrow">
            <img class="animatedBackInDown" src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/Imgs/Seta.png" alt="Seta para descer a tela">
        </div>
    </div>

    <!-- Segundo container -->
    <!--Slider-->
    <div id="targetDiv" class="container2 d-flex justify-content-center align-items-center">
        <header class="container d-flex justify-content-center align-items-center">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="9000">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                        aria-label="Slide 5"></button>
                </div>
                <div class="carousel-inner" id="divJuan">
                    <div class="carousel-item active d-flex justify-content-center align-items-center">
                        <a href=""><img id="Img1" src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/Imgs/1_Large.png" class="d-block w-100 img-fluid"
                                alt="Primeira apresentação"></a>
                    </div>
                    <div class="carousel-item">
                        <a href=""><img id="Img2" src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/Imgs/2_Large.png" class="d-block w-100 img-fluid"
                                alt="Segunda apresentação"></a>
                    </div>
                    <div class="carousel-item">
                        <a href=""><img id="Img3" src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/Imgs/3_Large.png" class="d-block w-100 img-fluid"
                                alt="Terceira apresentação"></a>
                    </div>
                    <div class="carousel-item">
                        <a href=""><img id="Img4" src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/Imgs/4_Large.png" class="d-block w-100 img-fluid"
                                alt="Quarta apresentação"></a>
                    </div>
                    <div class="carousel-item">
                        <a href=""><img id="Img5" src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/Imgs/5_Large.png" class="d-block w-100 img-fluid"
                                alt="Quinta apresentação"></a>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </header>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-" crossorigin="anonymous"></script>
<script src="{{ asset('js/home.js') }}"></script>
</body>

</html>