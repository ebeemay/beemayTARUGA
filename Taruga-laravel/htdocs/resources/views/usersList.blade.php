@extends('layouts.headerFooter')

@section('title', 'Taruga')

@push('styles')
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href=" {{ asset('css/usersList.css')}}?v={{ time() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Jost">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
@endpush


@section('content')

    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget("https://vlibras.gov.br/app");
    </script>

    <!-- Seta -->
    <div class="seta">
        <a onclick="window.history.back()">
            <i class="iconSeta bi bi-arrow-left-circle-fill fs-1"></i>
        </a>
    </div>

  <div class="centro-bemVindo">
    <h1 id="mensagemBemVindo">Seja Bem-Vindo(a) <u>{{ auth()->user()->nome }}</u>!</h1>
</div>

    
    <!--<div class="container-turmaInfo">
        <div class="turma">
            <span> <strong> TURMA [?] </strong> </span>
        </div>
        <div class="turma-img-info">
        <img src="https://itens-cabecalho.s3.amazonaws.com/editInco_preto.png">
        <img src="https://itens-cabecalho.s3.amazonaws.com/infoIcon.png">
    </div>
    </div> -->



    <div class="divTitulo">
        <div class="titulo">
            <i class="iconTitulo bi bi-pencil-square fs-3"></i>
            @if(session('user_type') == 'institution')
            <p>Gerencie seus professores!</p>
            @elseif(session('user_type') == 'teacher')
            <p>Gerencie seus alunos!</p>
            @endif
        </div>
    </div>

    <div id="loading" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000;">
    <img src='https://itens-cabecalho.s3.us-east-1.amazonaws.com/gif_loading.gif' alt="Carregando...">
</div>


    <!--
    <div class="divCriarTurma">
        <div class="criarTurmaAzul">
            <button class="criarTurmaRoxo" data-bs-toggle="modal" data-bs-target="#criarTurmaModal">
                <div class="divIconCriarTurma">
                    <i class="bi bi-clipboard2-plus fs-1"></i>
                </div>
                <p>Criar Grupo</p>
            </button>
        </div>
    </div>
        <class="container-fluid fundoContainerItensGerais">
            /*Botão que exibe o conteúdo*/ 
        <div class="divButtonTurmas">
            <button onclick="toggleConteudo()" class="btn">
                ▼ Professores 4º Ano
            </button>
        </div>

        /*Conteúdo que será mostrado/ocultado*/
        <div id="conteudoToggle" class="conteudo-oculto">
        </div>-->


    <div class="caixaPesquisa">
        <div class="containerFluidPesquisarProfessores">
        @if(session('user_type') == 'institution')
            <form method="GET" action="{{ route('teachers.search') }}" class="d-flex" id="search-form">
                <input id="pesquisar" class="pesquisarDiv form-control me-2" type="search" name="search"
                    placeholder="Filtrar Professores" aria-label="Search" value="{{ request('search') }}">
                <button class="btn-pesquisa btn btn-outline-success" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
            @elseif(session('user_type') == 'teacher')
            <form method="GET" action="{{ route('students.search') }}" class="d-flex" id="search-form">
                <input id="pesquisar" class="pesquisarDiv form-control me-2" type="search" name="search"
                    placeholder="Filtrar Alunos" aria-label="Search" value="{{ request('search') }}">
                <button class="btn-pesquisa btn btn-outline-success" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
            @endif
        </div>
        <!-- Buttons Purple -->
        <div class="buttonsContainer">
        @if(session('user_type') == 'institution')
            <button id="btn-addProfessores" class="btn-gerais" data-bs-toggle="modal" data-bs-target="#criarTurmaModal">Adicionar Professores</button>
            @elseif(session('user_type') == 'teacher')
            <button id="btn-addProfessores" class="btn-gerais" data-bs-toggle="modal" data-bs-target="#criarTurmaModal">Registrar Alunos</button>
            @endif
            <!--<button class="btn-gerais">Gerar PDF</button>-->
        </div>
        <!-- FIM Buttons Purple -->
    </div>



    <!-- Modal Criar Professores -->
<form action="{{ session('user_type') === 'teacher' ? route('student.register.t') : url('/teachers') }}" method="POST">
    @csrf
    <div class="modal fade" id="criarTurmaModal" tabindex="-1" aria-labelledby="criarTurmaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal_RegistrarProfessor_ContainerHeader">
                        @if(session('user_type') == 'institution')
                        <h1 class="modal-title fs-5" id="criarTurmaModalLabel">Registrar Professor</h1>
                        @elseif(session('user_type') == 'teacher')
                        <h1 class="modal-title fs-5" id="criarTurmaModalLabel">Registrar Aluno</h1>
                        @endif
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="centralizaInputsModal">
                        <!-- Nome -->
                        <div class="modalInputsIcon">
                            <i id="iconModal" class="bi bi-person"></i>
                            @if(session('user_type') == 'institution')
                            <input class="ModalInputs" id="nome" name="nome" type="text" placeholder="Nome do Professor" required>
                            @elseif(session('user_type') == 'teacher')
                            <input class="ModalInputs" id="nome" name="nome" type="text" placeholder="Nome do Aluno" required>
                            @endif
                        </div>
                        
                        <!-- Email -->
                        <div class="modalInputsIcon">
                            <i id="iconModal" class="bi bi-envelope"></i>
                            @if(session('user_type') == 'institution')
                            <input class="ModalInputs" id="email" name="email" type="email" placeholder="Email do Professor" required>
                            @else
                            <input class="ModalInputs" id="email" name="email" type="email" placeholder="Email do Aluno" required>
                            @endif
                        </div>
                        
                        <!-- RP (Número) -->
                        <div class="modalInputsIcon">
                            <i id="iconModal" class="bi bi-person-badge"></i>
                            @if(session('user_type') == 'institution')
                            <input class="ModalInputs" id="rp" name="rp" type="text" placeholder="RP do Professor" 
                                    minlength="10" 
                                    maxlength="10" 
                                    pattern="\d{10}" title="O RP deve conter exatamente 10 números" 
                            required>
                            @elseif(session('user_type') == 'teacher')
                            <input class="ModalInputs" id="ra" name="ra" type="text" placeholder="RA do Aluno" 
                                    minlength="10" 
                                    maxlength="10" 
                                    pattern="\d{10}" title="O RA deve conter exatamente 10 números" 
                            required>
                            @endif
                        </div>
                        
                        <!-- Senha -->
                        <div class="modalInputsIcon">
                            <i id="iconModal" class="bi bi-key"></i>
                            @if(session('user_type') == 'institution')
                            <input class="ModalInputs" id="senha" name="senha" type="password" placeholder="Senha provisória do Professor" required minlength="6">
                            @elseif(session('user_type') == 'teacher')
                            <input class="ModalInputs" id="senha" name="senha" type="password" placeholder="Senha do Aluno" required minlength="6">
                            @endif
                        </div>
                        @if(session('user_type') == 'teacher')
                        <div class="inputBox">
                            <select id="situacao" name="situacao" required>
                                <option value="" selected disabled>Situação</option>
                                <option value="Ouvinte">Ouvinte</option>
                                <option value="Não-ouvinte">Não-Ouvinte</option>
                            </select>
                        </div>
                         @endif
                    </div>
                </div>
                
                <div class="modal-footer" id="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="submit" value="CADASTRAR" class="btn">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</form>
    <!--FIM MODAL REGISTRAR PROFESSOR-->


    <!--TABELA-->
    <div class="container-tabela">
        <div class="tabela">
            <table class="colunas-texto">
                <thead>
                    <tr>
                    @if(session('user_type') == 'institution')
                        <th class="borderThLeft" scope="col">RP</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th class="borderThRight" scope="col">Opções</th>
                    @elseif(session('user_type') == 'teacher')
                        <th class="borderThLeft" scope="col">RA</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Situação</th>
                        <th class="borderThRight" scope="col">Opções</th>
                    @endif
                    </tr>
                </thead>

                @if(session('user_type') == 'institution')
                @if (!$teachers || $teachers->isEmpty())
                <div class="semProf">
                    <p>Nenhum professor encontrado.</p>
                </div>
                @else
                @foreach ($teachers as $teacher)
                <tbody>
                        <tr>
                        <td>{{ $teacher->rp }}</td>
                        <td>{{ $teacher->nome }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td class="botoesEditDel">  
              <!--FIM TABELA-->                      
                <form method="POST" style="display:inline-block;">
                    <a class='btn-editar' data-bs-toggle="modal" data-bs-target="#editarProfessorModal-{{ $teacher->id }}">
                            <img src='https://itens-cabecalho.s3.amazonaws.com/editar_lista.png' alt='Editar professores'/>
                    </a>
                </form>

<!-- Modal EDITAR Professores -->

 <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
    @csrf
     @method('PUT')
    <div class="modal fade" id="editarProfessorModal-{{ $teacher->id }}" tabindex="-1" aria-labelledby="criarTurmaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal_RegistrarProfessor_ContainerHeader">
                        <h1 class="modal-title fs-5" id="criarTurmaModalLabel">Registrar Professor</h1>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="centralizaInputsModal">
                        <!-- Nome -->
                        <div class="modalInputsIcon">
                            <i id="iconModal" class="bi bi-person"></i>
                            <input class="ModalInputs" id="nome" name="nome" type="text" placeholder="Nome do Professor" value="{{ $teacher->nome }}" required>
                        </div>
                        
                        <!-- Email -->
                        <div class="modalInputsIcon">
                            <i id="iconModal" class="bi bi-envelope"></i>
                            <input class="ModalInputs" id="email" name="email" type="email" placeholder="Email do Professor" value="{{ $teacher->email }}">
                        </div>
                        
                        <!-- RP (Número) -->
                        <div class="modalInputsIcon">
                            <i id="iconModal" class="bi bi-person-badge"></i>
                            <input class="ModalInputs" id="rp" name="rp" type="text" placeholder="RP do Professor"  value="{{ $teacher->rp }}"
                                    minlength="10" 
                                    maxlength="10" 
                                    pattern="\d{10}" title="O RP deve conter exatamente 10 números" 
                            required>
                        </div>
                        
                    </div>
                </div>
                
                <div class="modal-footer" id="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="submit"  class="btn">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--FIM MODAL EDITAR PROFESSOR-->

<!--MUDAR ISSO DPS, DELETE SOMENTE PARA TESTE-->
    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button  class="apaga" onclick="return confirm('Tem certeza que deseja excluir este professor?')">
                    <a class='btn-apagar'>
                        <img src='https://itens-cabecalho.s3.amazonaws.com/delete_lista.png' alt='Excluir professores'/>
                    </a>
                    </button>
            </form>
                </td>
                </tr>
        </tbody>
        @endforeach
        @endif

        <!--------------- Professor ----------------->

        @else
        @if (!$students || $students->isEmpty())
        <div class="semProf">
            <p>Nenhum aluno encontrado.</p>
        </div>
        @else
        @foreach ($students as $student)
        <tbody>
                <tr>
                <td>{{ $student->ra }}</td>
                <td>{{ $student->nome }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->situacao }}</td>
                <td class="botoesEditDel">  
        
              <!--FIM TABELA-->                      
                <form method="POST" style="display:inline-block;">

                    <a class='btn-editar' data-bs-toggle="modal" data-bs-target="#editarProfessorModal-{{ $student->id }}">
                            <img src='https://itens-cabecalho.s3.amazonaws.com/editar_lista.png' alt='Editar professores'/>
                    </a>

                </form>


<!-- Modal EDITAR Professores -->

 <form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
     @method('PUT')
    <div class="modal fade" id="editarProfessorModal-{{ $student->id }}" tabindex="-1" aria-labelledby="criarTurmaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal_RegistrarProfessor_ContainerHeader">
                        <h1 class="modal-title fs-5" id="criarTurmaModalLabel">Registrar Aluno</h1>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="centralizaInputsModal">
                        <!-- Nome -->
                        <div class="modalInputsIcon">
                            <i id="iconModal" class="bi bi-person"></i>
                            <input class="ModalInputs" id="nome" name="nome" type="text" placeholder="Nome do Aluno" value="{{ $student->nome }}" required>
                        </div>
                        
                        <!-- Email -->
                        <div class="modalInputsIcon">
                            <i id="iconModal" class="bi bi-envelope"></i>
                            <input class="ModalInputs" id="email" name="email" type="email" placeholder="Email do Aluno" value="{{ $student->email }}">
                        </div>
                        
                        <!-- RA (Número) -->
                        <div class="modalInputsIcon">
                            <i id="iconModal" class="bi bi-person-badge"></i>
                            <input class="ModalInputs" id="rp" name="rp" type="text" placeholder="RA do Aluno"  value="{{ $student->ra }}"
                                    minlength="10" 
                                    maxlength="10" 
                                    pattern="\d{10}" title="O RP deve conter exatamente 10 números" 
                            required>
                        </div>

                        <div class="inputBox">
                            <select id="situacao" name="situacao" required>
                                <option value="" selected disabled>Situação</option>
                                <option value="Ouvinte">Ouvinte</option>
                                <option value="Não-ouvinte">Não-Ouvinte</option>
                            </select>
                        </div>
                        
                    </div>
                </div>
                
                <div class="modal-footer" id="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="submit"  class="btn">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--FIM MODAL EDITAR ALUNO-->

<!--MUDAR ISSO DPS, DELETE SOMENTE PARA TESTE-->
    <form action="{{ route('students.delete', $student->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button  class="apaga" onclick="return confirm('Tem certeza que deseja excluir este aluno?')">
                            <a class='btn-apagar'>
                                <img src='https://itens-cabecalho.s3.amazonaws.com/delete_lista.png' alt='Excluir alunos'/>
                            </a>
                            </button>
    </form>
                        </td>
                        </tr>
                </tbody>
                @endforeach
                @endif


                @endif
            </table>
        </div>
    </div>
    </div>

    <div class="space"></div>

<!--SCRIPT JS-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="{{ asset('js/usersList.js') }}?v={{ time() }}"></script>


@endsection