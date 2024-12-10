@extends('layouts.headerFooter')

@section('title', 'Taruga')

@push('styles')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost">
  <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
  <title>Equipe Beemay!</title>
  <link rel="stylesheet" href=" {{ asset('css/aboutUs.css')}}?v={{ time() }}">
@endpush

@section('content')

 <!-- Seta -->
 <div class="seta">
        <a onclick="window.history.back()">
            <i class="iconSeta bi bi-arrow-left-circle-fill fs-1"></i>
        </a>
    </div>
    
  <div class="section">
    <div class="texto-content">
      <h1>Somos mais que uma plataforma</h1>
      <p>
        Nós somos um grupo de jovens universitários altamente motivados, unidos por uma missão apaixonante: difundir valores de significância profunda através de experiências de entretenimento e lazer. A nossa dedicação é oferecer um suporte tangível às pessoas em suas vidas diárias, contribuindo para o seu bem-estar.      
      </p>
      <p>
        Nossos produtos é meticulosamente concebido com um propósito maior. Além de proporcionar momentos de diversão e distração, eles são cuidadosamente incorporados com princípios socioemocionais que consideramos cruciais para o desenvolvimento humano. Acreditamos que, ao integrar esses valores em nossas criações, podemos desempenhar um papel ativo no crescimento pessoal de cada indivíduo
      </p>
      <p>
        A cooperação e a responsabilidade são fundamentais para promover o trabalho em equipe com organização, alegria, confiança e uma experiência positiva!
      </p>
    </div>
    <div class="image-content">
      <img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/beemay+c%C3%B3pia.jpg" alt="Equipe Beemay">
    </div>
  </div>
  <div class="projetos">
    <h2>Mais um projeto de nossa autoria:</h2>
  </div>

<div class="alinhar-cards">
    <div class="cardAnother">
        <div class="imagem-container">
          <img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/ANOTHER+WORLD.png" alt="Equipe Beemay Oficial">
        </div>
        <div class="content">
          <h1>SOFTWARE SOCIOEMOCIONAL: ANOTHER WORLD</h1>
          <p>
            Another World aborda o aspecto socioemocional, com o objetivo de entreter o usuário por meio de um software de gamificação. Ele se concentra em refletir de forma lúdica tópicos contemporâneos, transtornos, questões emocionais e situações do dia a dia por meio de histórias e personagens. 
          </p>
          <p>
            Consiste em um aplicativo de entretenimento para desktop, um jogo que orienta um público jovem a explorar o autoconhecimento enquanto oferece um ambiente de distração.

          </p>
          <p>
            O projeto deste trabalho de conclusão de curso foi imaginado e projetado para levar valores socioemocionais e conscientizar as pessoas sobre os problemas comuns relacionados a sociedade e ao psicológico, de uma maneira lúdica e por meio do entretenimento!
          </p>
         
        </div>
    </div>

</div>

  <section class="equipe-section">
    <h1 class="equipe-h1">Conheça-nos:</h1>
    <div class="equipe-container">

      <div class="equipe-card">
        <div class="image-wrapper">
          <img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/Design+sem+nome+(3).png" alt="Foto de Ana Campanholi">
        </div>
        <h2>Ana Campanholi</h2>
        <p>Scrum Master & Web Designer</p>
        <div class="social-icons">
          <a href="https://www.linkedin.com/in/ana-carolina-campanholi-4554b1259" target="_blank"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/iconLinkedin.png" alt="LinkedIn"></a>
        </div>
      </div>

      <div class="equipe-card">
        <div class="image-wrapper">
          <img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/Design+sem+nome+(1).png" alt="Foto de Enzo Costa">
        </div>
        <h2>Enzo Costa</h2>
        <p>DBA & Back-end Developer</p>
        <div class="social-icons">
          <a href="https://www.linkedin.com/in/enzo-costa-1a230b262/" target="_blank"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/iconLinkedin.png" alt="LinkedIn"></a>
        </div>
      </div>

      <div class="equipe-card">
        <div class="image-wrapper">
          <img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/Design+sem+nome.png" alt="Foto de Giovanna Ribeiro">
        </div>
        <h2>Giovanna Ribeiro</h2>
        <p>Full Stack & Web Designer</p>
        <div class="social-icons">
          <a href="https://www.linkedin.com/in/giovanna-ribeiro-ti/" target="_blank"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/iconLinkedin.png" alt="LinkedIn"></a>
        </div>
      </div>

      <div class="equipe-card">
        <div class="image-wrapper">
          <img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/Design+sem+nome+(4).png" alt="Foto de Isabel Almeida">
        </div>
        <h2>Isabel Almeida</h2>
        <p>Frontend Developer</p><br>
        <div class="social-icons">
          <a href="#" target="_blank"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/iconLinkedin.png" alt="LinkedIn"></a>
        </div>
      </div>


      <div class="equipe-card">
        <div class="image-wrapper">
          <img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/Design+sem+nome+(2).png" alt="Foto de Renan Queiroz">
        </div>
        <h2>Renan Queiroz</h2>
        <p>Designer & Web Designer</p><br>
        <div class="social-icons">
          <a href="https://www.linkedin.com/in/renan-queiroz-847a47212?" target="_blank"><img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/iconLinkedin.png" alt="LinkedIn"></a>
        </div>
      </div>
    </div>
  </section>

  @endsection