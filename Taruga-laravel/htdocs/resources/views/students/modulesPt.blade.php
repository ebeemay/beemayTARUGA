@extends('layouts.headerFooter')

@section('title', 'Taruga')

@push('styles')
    <link rel="stylesheet" href=" {{ asset('css/modules.css')}}?v={{ time() }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

@section('content')


    <!-- Seta -->
    <div class="seta">
        <a onclick="window.history.back()">
            <i class="iconSeta bi bi-arrow-left-circle-fill fs-1"></i>
        </a>
    </div>

    <!-- Conteúdo Principal -->
    <div class="container mb-5">
        <section class="module" style="background: #8FCAEB;">
            <!--Fundo modulo-->
            <h2 class="module-title">Módulo 1 - Português: Gramática</h2>

            
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-3 mb-3 d-flex align-items-center justify-content-center">
                <form action="{{ route('iniciar.progressoPt', ['materia' => 'portugues', 'numeroAtividade' => 1]) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link p-0">
                    <div class="card">
                        <div class="card-body bg-warning d-flex align-items-center justify-content-center">
                            <img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/LetrasModule.png" alt="Módulo 1, Aprendendo o alfabeto em protuguês"
                                class="img-fluid">
                                <div class="overlay"></div>
                                <span class="overlay-text">Alfabeto</span>
                        </div>
                    </div>
                    </button>
                </form>
                </div>
                
                <div class="col-md-3 mb-3 d-flex align-items-center justify-content-center">
                    <div class="card">
                        <div class="card-body bg-warning d-flex align-items-center justify-content-center">
                            <img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/CinzaModule.jpg" alt="Módulo 2, será feito em breve"
                                class="img-fluid">

                            <div class="overlay"></div>
                            <span class="overlay-text">Em Breve</span>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3 d-flex align-items-center justify-content-center">
                    <div class="card">
                        <div class="card-body bg-warning d-flex align-items-center justify-content-center">
                            <img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/CinzaModule.jpg" alt="Módulo 3, será feito em breve" class="img-fluid">
                           
                            <div class="overlay"></div>
                            <span class="overlay-text">Em Breve</span>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="module" style="margin-top: 50px; background: #F0A157;">
            <h2 class="module-title"> Módulo 2 - Português: Consciência visual </h2>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-3 mb-3 d-flex align-items-center justify-content-center">
                    
                    <div class="card">
                        <div class="card-body bg-warning d-flex align-items-center justify-content-center">
                            <img src=" https://itens-cabecalho.s3.us-east-1.amazonaws.com/CinzaModule.jpg" alt="Módulo 4, será feito em breve"
                                class="img-fluid">

                                <div class="overlay"></div>
                                <span class="overlay-text">Em Breve</span>
                        </div>
                    </div>
                   
                </div>
                <div class="col-md-3 mb-3 d-flex align-items-center justify-content-center">
                    <div class="card">
                        <div class="card-body bg-warning d-flex align-items-center justify-content-center">
                            <img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/CinzaModule.jpg" alt="Módulo 5, será feito em breve"
                                class="img-fluid">

                           <div class="overlay"></div>
                            <span class="overlay-text">Em Breve</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3 d-flex align-items-center justify-content-center">
                    <div class="card">
                        <div class="card-body bg-warning d-flex align-items-center justify-content-center">
                            <img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/CinzaModule.jpg" alt="Módulo 6, Será feito em breve" class="img-fluid">
                            <div class="overlay"></div>
                            <span class="overlay-text">Em Breve</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <script src="{{ asset('js/modules.js')}}?v={{ time() }}"></script>
@endsection