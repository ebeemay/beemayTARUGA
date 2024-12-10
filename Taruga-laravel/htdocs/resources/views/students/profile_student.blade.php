@extends('layouts.headerFooter')

@section('title', 'Taruga')

@push('styles')
    <link rel="stylesheet" href=" {{ asset('css/profile_student.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Seta -->
    <div class="seta">
        <a onclick="window.history.back()">
            <i class="iconSeta bi bi-arrow-left-circle-fill fs-1"></i>
        </a>
    </div>
    
<div class="page-content">
    <div class="caixa-perfil">
        <div class="sidebar">
            <!--<div id="icon-perfil"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/user_foto.png"></div>-->
            <div id="icon-perfil"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/gifs+(7).gif"></div>
            
            <!-- Botão de troca de perfil -->
            <!--<button class="camera-icon"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/trocar_perfil.png"></button>-->
            
            <div class="info">{{ auth()->user()->nome }}</div>
            <div class="info">{{ auth()->user()->email }}</div>
            <div class="info">{{ auth()->user()->class->nome ?? 'Sem turma atribuída' }}</div>
            <div class="info">{{ auth()->user()->situacao }}</div>
            <button class="reset-senha classeDoBotão"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/medalha.png"></button>
        </div> 

        <div class="main-conteudo">
            <div class="nome-prof">Nome Professor(a): {{ auth()->user()->teacher->nome  ?? 'Sem Professor atribuído'}}</div>
            <div class="progresso-cards">
                <div class="progresso">100%</div>
                <div class="cards">
                    <div class="card completo"><label><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/brasil_icon.png"></label></div>
                    <div class="card completo"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/libras_icon.png"></div>
                    
                    <div class="card"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/cadeado.png"></div>
                    <div class="card"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/cadeado.png"></div>
                    <div class="card"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/cadeado.png"></div>
                    <div class="card"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/cadeado.png"></div>
                </div> 
            </div>
        </div>
    </div> 
</div>

<script src="{{ asset('js/profile_student.js')}}" defer></script>

@endsection
