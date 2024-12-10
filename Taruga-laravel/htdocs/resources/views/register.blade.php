<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href=" {{ asset('css/register.css')}}?v={{ time() }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost" />
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  

  <title>Formulário</title>

</head>

<body>


 <!-- Seta -->
 <div class="seta">
        <a onclick="window.history.back()">
            <i class="iconSeta bi bi-arrow-left-circle-fill fs-1"></i>
        </a>
    </div>


  <div class="alignDivForm">
    <div class="DivForm">
      <div class="div-DivInf">
        
      <div class="DivInf">
          <p id="TarugaTitulo">Taruga</p>
          <p id="BemVindoTitulo">BEM-VINDO(a)!<br /></p>

          <p id="TextTitulo">
            Novo por aqui? crie<br />
            sua conta e venha se<br />
            divertir com a gente!<br />
          </p>
          
        </div>
      </div>

      
      <div class="alignLog">
      
        <form action="{{ $userType === 'student' ? route('student.register') : route('institution.register') }}" method="POST">
          @csrf
          <div id="AlignTituloLogin">
            <h2>Crie a sua conta!</h2>
          </div>
          
          <div class="inputBox">
            <input
              type="text"
              name="nome"
              id="nome"
              class="inputUser"
              required
              placeholder="Nome " />
          </div>
         

          <div class="inputBox">
            <input
              type="text"
              name="email"
              id="email"
              class="inputUser"
              required
              placeholder="Email" />
          </div>


          @if($userType === 'student')
            <!-- Campos específicos para Estudantes -->
            <div class="inputBox">
              <select id="situacao" name="situacao" required>
                <option value="" selected disabled>Situação</option>
                <option value="Ouvinte">Ouvinte</option>
                <option value="Não-ouvinte">Não-Ouvinte</option>
              </select>
            </div>

            @elseif($userType === 'institution')
            <!-- Campos específicos para Instituições -->
            <div class="inputBox">
              <input type="text" name="cnpj" id="cnpj" class="inputUser" required placeholder="CNPJ" 
              maxlength="18"
              pattern="\d{2}\.\d{3}\.\d{3}/\d{4}-\d{2}" 
              title="O CNPJ deve estar no formato 00.000.000/0000-00">
            </div>
            <div class="inputBox">
              <input type="text" name="endereco" id="endereco" class="inputUser" required placeholder="Endereço completo" />
          </div>

            <div class="inputBox">
              <input type="text" name="telefone" id="telefone" class="inputUser" required placeholder="Telefone" 
              maxlength="15"
              pattern="\(\d{2}\)\s\d{4,5}-\d{4}" 
              title="O telefone deve estar no formato (00) 00000-0000" />
            </div>

        
          @endif

          <div class="inputBox">
            <input
              type="password"
              name="senha"
              id="senha"
              class="inputUser"
              required
              placeholder="Senha" />
          </div>

          <div class="inputBox">
            <input
              type="password"
              name="senha_confirmation"
              id="senha_confirmacao"
              class="inputUser"
              required
              placeholder="Confirmar senha" />
          </div>


         

          <div id="alignBottomEnviar">
            <input
              type="submit"
              name="submit"
              id="submit"
              value="CADASTRAR" />
          </div>

        </form>

    @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </div>
 

    </div>
  </div>

  <script src="{{ asset('js/register.js') }}"></script>

</html>