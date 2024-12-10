@extends('layouts.headerFooter')

@section('title', 'Contato')

@push('styles')
    <link rel="stylesheet" href=" {{ asset('css/contact.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost">
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
@endpush

@section('content')
    <!--contato-->

     <!-- Seta -->
     <div class="seta">
        <a onclick="window.history.back()">
            <i class="iconSeta bi bi-arrow-left-circle-fill fs-1"></i>
        </a>
    </div>

<div class="alignImgFormulario">
            <div class="imgContato">
                <img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/contatoRedes.gif" alt="GIF de uma mão com celular conectado à redes sociais em pixel art">
            </div> 
       
            <div class="formulario">
                <h2>Contate-nos</h2>
            
                <form action="{{ route('send.email') }}" method="POST" enctype="multipart/form-data">
                @csrf
                        <input type="text" placeholder="Seu nome">
                        <input type="email" placeholder="Seu email">
                        <textarea placeholder="Digite sua mensagem:"></textarea>
                        <input type="file"  name="attachment"  accept=".jpg,.jpeg,.png,.pdf">
                
                </form>

                <button type="submit">Enviar</button>

                    <div class="social-icons">
                        <a href="#"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/emailIcon_.png" alt="Email"></a>
                        <a href="#"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/instaIcon.png" alt="Instagram"></a>
                        <a href="#"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/iconLinkedin.png" alt="LinkedIn"></a>
                    </div>
             </div>


             @if ($errors->any())
    <div style="color: red; background: #ffe6e6; padding: 10px; border: 1px solid red; margin-bottom: 15px; border-radius: 5px;">
        <strong>Por favor, corrija os seguintes erros:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div style="color: green; background: #e6ffe6; padding: 10px; border: 1px solid green; margin-bottom: 15px; border-radius: 5px;">
        {{ session('success') }}
    </div>
@endif

  @endsection