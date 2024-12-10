@extends('layouts.headerFooter')

@section('title', 'Identificação')

@push('styles')
    <link rel="stylesheet" href="telaIdent.css" />
    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Jost"/>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href=" {{ asset('css/identification.css')}}?v={{ time() }}">
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
@endpush

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <!-- Seta -->
    <div class="seta">
        <a onclick="window.history.back()">
            <i class="iconSeta bi bi-arrow-left-circle-fill fs-1"></i>
        </a>
    </div>
    <!--Centro página-->
    
    <div class="alignCenter">
      <div class="container-bemVindo">
        <div class="header-conteiner">
          <p>BEM VINDO AO TARUGA! POR FAVOR NOS INFORME QUEM VOCÊ É:</p>
        </div>

            <div class="pais">
              <div class="professor">
                <div class="align-img">
                   <img
                      src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/Professora_TelaIdent.png"
                      alt="Imagem de uma professora"
                   />
                 </div>
                <div class="align-p">
                    <p>Sou professor (a)!</p>
                </div>
                <div class="align-button">
                  <a href="{{ route('choose-login', 'teacher') }}" class="btn">Entrar</a>
                </div>
            </div>

            <div class="aluno">
              <div class="align-img">
                <img
                  src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/Bolsa_TelaIdent.png"
                  alt="Imagem de uma bolsa escolar"
                />
              </div>
              <div class="align-p">
                <p>Sou aluno (a)!</p>
              </div>
              <div class="align-button">
                <a href="{{ route('choose-login', 'student') }}" class="btn">Entrar</a>
              </div>
            </div>

            <div class="instituicao">
              <div class="align-img">
                <img
                  src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/Escola_TelaIdent.png"
                  alt="Imagem de uma instituição escolar"
                />
              </div>
              <div class="align-p">
                <p>Sou instituição!</p>
              </div>
              <div class="align-button">
                 <a href="{{ route('choose-login', 'institution') }}" class="btn">Entrar</a>
              </div>
            </div>

            <div class="comunUser">
              <div class="align-img">
                <img
                  src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/User_TelaIdent.png"
                  alt="Foto do simbolo de um usuário"
                />
              </div>
              <div class="align-p">
                <p>Sou usuário comum!</p>
              </div>

              <div class="align-button">
                <a href="{{ route('choose-login', 'student') }}" class="btn">Entrar</a>
              </div>
            </div>
      </div>

          <div id="openPopupButton" class="btn-align">

              <button class="btnNTC">
                  Não tenho cadastro
              </button>
            </div>
          </div>


          <!-- Popup -->
<div id="popup" class="popup-overlay" style="display: none;">
    <div class="popup-content">
        <span class="close-button" id="closePopupButton"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/close_button.png"></span>
        <p>Como você gostaria de se cadastrar?</p>
        <button><a href="{{ route('choose-register', 'institution') }}"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/Escola_TelaIdent.png">Como Instiuição!</a></button>
        <button><a href="{{ route('choose-register', 'student') }}"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/User_TelaIdent.png">Como usuário comum!</a></button>
    </div>
</div>

    <script src="{{ asset('js/identification.js') }}"></script>
@endsection
