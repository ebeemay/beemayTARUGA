
@extends('layouts.headerFooter')

@section('title', 'Taruga')

@push('styles')
    <link rel="stylesheet" href=" {{ asset('css/searchSubject.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
@endpush

<!----CONTEUDO-->
@section('content')

    <!-- Seta -->
    <div class="seta">
        <a onclick="window.history.back()">
            <i class="iconSeta bi bi-arrow-left-circle-fill fs-1"></i>
        </a>
    </div>
    
<div class="page-content">
    <div class="container-verde">
        <h1>Por onde deseja começar?</h1>
        <p class="recomendacao">
            <span> <img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/alert_icon.png">RECOMENDADO:</span> alunos não ouvintes sejam alfabetizados primeiramente em LIBRAS!
        </p>
        <div class="buttons">

            <div class="button_pt">
            <a href="{{ route('ModulesPt') }}">
                <img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/brasil_icon.png" alt="Português">

                <button class="container-span"> 
                    <span>Português</span>
                </button>
            </a>
            </div>

            <div class="button_libras">
            <a href="{{ route('Modules') }}">
                <img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/libras_icon.png" alt="LIBRAS">
                <button class="container-span">
                   <span>LIBRAS</span>
                </button>
            </a>
            </div>
        </div>
    </div>
  </div>
  <!--<script src="{{ asset('js/searchSubject.js') }}"></script>-->
@endsection