@extends('layouts.headerFooter')

@section('title', 'Taruga')

@push('styles')
  <link rel="stylesheet" href=" {{ asset('css/homeUser.css')}}?v={{ time() }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Jersey+10&amp;display=swap" rel="stylesheet">
@endpush

  @section('content')

      <!-- Seta -->
      <div class="seta">
        <a onclick="window.history.back()">
            <i class="iconSeta bi bi-arrow-left-circle-fill fs-1"></i>
        </a>
    </div>
    
  <!-- Seção de Boas-Vindas -->
   <div class= "alignGifConteudo">
            <div class="bemVindo">
              <h2>Bem-vindo(a) ao Taruga!</h2>

              @if(session('user_type') == 'institution')
              <p>Olá {{ auth()->user()->nome }}! Como um programa educacional para ajudar alunos e pessoas em um geral 
                  no ensino fundamental, sempre buscamos dar o maior apoio possível! 
                  Gostaria de conhecer mais sobre o projeto ou ir direto para criar 
                  registros?</p>
              <button class="conhecaMais"><a href="{{ route('AboutUsInstitution') }}">Conheça Mais</a></button>
              <button class="criarRegistros"><a href="{{ route('institution.list') }}">Criar Registros</a></button>

              @elseif(session('user_type') == 'student')
              <p>Desejamos boas-vindas a você {{ auth()->user()->nome }}! O 
                que gostaria de fazer agora que caiu de paraquedas aqui? Talvez, conhecer mais do nosso time ou 
                ir direto para as atividades?</p>
              <button class="conhecaMais"><a href="{{ route('AboutUsStudent') }}">Conheça Mais</a></button>
              <button class="criarRegistros"><a href="{{ route('SearchSubject') }}">Atividades</a></button>

              @elseif(session('user_type') == 'teacher')
              <p>Olá {{ auth()->user()->nome }}! Como um programa educacional para ajudar alunos e 
                pessoas em um geral no ensino fundamental, sempre buscamos dar o maior apoio possível! 
                Gostaria de conhecer mais sobre o projeto ou ir direto para criar turmas?</p>
              <button class="conhecaMais"><a href="{{ route('AboutUsTeacher') }}">Conheça Mais</a></button>
              <button class="criarRegistros"><a href="{{ route('teacher.list') }}">Turmas</a></button>

              @endif
      </div>
          <img class="gifCoelho" src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/gifs+(4).gif" alt="GIF coelho">
      </div>

  </div>

  <!-- Conteúdo texto do Usuário -->

  <div class="textoUsuario">
    <div class="img-texto-container">
    @if(session('user_type') != 'student')
      <img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/gifs+(2).gif" alt="GIF coruja">
      @else
      <img src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/gifs+(6).gif" alt="GIF coruja">
      @endif

      @if(session('user_type') == 'institution')
      <p>No universo em constante evolução da tecnologia educacional, o aplicativo Taruga se destaca como um recurso 
        inclusivo para a alfabetização em português e Libras. Projetado com a missão de promover a educação igualitária e acessível para crianças ouvintes e não ouvintes,
         o Taruga oferece uma plataforma envolvente e dinâmica para aprender e praticar habilidades fundamentais de linguagem.<br><br>
        O papel fundamental da instituição é garantir que todos os professores 
        interessados possam ser cadastrados para o banco de dados e, assim, tornar possível a lecionagem nas salas do Taruga. </p>

      @elseif(session('user_type') == 'student')
      <p>E aí, {{ auth()->user()->nome }}!  Vamos falar sobre o Taruga, um aplicativo que vai te ajudar a estudar português e Libras. 
        Isso mesmo, o Taruga é demais porque é feito tanto para quem ouve quanto para quem não ouve.
        Todo mundo junto na mesma festa de aprendizado!<br><br>
        Você como aluno pode aproveitar o quanto quiser! Estude e se divirta, 
        avance os módulos de cada matéria e siga as instruções do seu professor.</p>

        
      @elseif(session('user_type') == 'teacher')
      <p>No universo em constante evolução da tecnologia educacional, o aplicativo 
        Taruga se destaca como um recurso inclusivo para a alfabetização em português 
        e Libras. Projetado com a missão de promover a educação igualitária e acessível 
        para crianças ouvintes e não ouvintes, o Taruga oferece uma plataforma envolvente e 
        dinâmica para aprender e praticar habilidades fundamentais de linguagem.!<br><br>
        Contamos com você nessa jornada para auxiliar nossos pequenos, entregando-lhes a 
        oportunidade de adquirir conhecimento. Incentivem os alunos a explorarem o Taruga de 
        forma guiada. Mostrem como eles podem acessar as lições em português e Libras, explicando 
        que ambos são importantes para uma comunicação inclusiva. Destaquem como eles podem 
        progredir no próprio ritmo e desfrutar das atividades criativas que o aplicativo oferece.</p>

      @endif

</div>

@endsection