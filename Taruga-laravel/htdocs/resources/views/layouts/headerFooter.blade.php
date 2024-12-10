<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href=" {{ asset('css/headerFooter.css')}}?v={{ time() }}">
    @stack('styles') <!-- Permite adicionar estilos específicos para cada página -->
</head>
<body>
            <!-- VLIBRAS -->

            <div vw class="enabled">
            <div vw-access-button class="active"></div>
            <div vw-plugin-wrapper>
                <div class="vw-plugin-top-wrapper"></div>
            </div>
        </div>


        <!---------------------------->
     <!-- Header -->
     <nav class="header navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img class="logoImg" src="https://itens-cabecalho.s3.us-east-1.amazonaws.com/taruga_logo_escrito+(1).png" alt="Logo do taruga">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                @if(session('user_type') == 'student')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('HomeStudent') }}">
                            <i class="bi bi-house-door-fill me-1"></i> Início
                        </a>
                    </li>
                @elseif(session('user_type') == 'teacher')
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('HomeTeacher') }}">
                        <i class="bi bi-house-door-fill me-1"></i> Início
                    </a>
                </li>
                @elseif(session('user_type') == 'institution')
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('HomeInstitution') }}">
                        <i class="bi bi-house-door-fill me-1"></i> Início
                    </a>
                </li>
                @endif
                
                    @if(session('user_type') == 'student')
                    <li class="nav-item fon">
                        <a class="nav-link" href="{{ route('SearchSubject') }}">
                            <i class="bi bi-book-half me-1"></i> Atividades
                        </a>
                    </li>

                    @elseif(session('user_type') == 'institution')
                    <li class="nav-item fon">
                        <a class="nav-link" href="{{ route('institution.list') }}">
                            <i class="bi bi-book-half me-1"></i> Professores
                        </a>
                    </li>
                    @elseif(session('user_type') == 'teacher')
                    <li class="nav-item fon">
                        <a class="nav-link" href="{{ route('teacher.list') }}">
                            <i class="bi bi-book-half me-1"></i> Turmas
                        </a>
                    </li>
                    @endif
                    @if(session('user_type') != null)
                    <li class="nav-item">
                        <div class="dropdown-center">
                            <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-justify"></i> Menu
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                                @if(session('user_type') == 'student')
                                <li><a class="dropdown-item" href="{{ route('Profile') }}">Meu Perfil</a></li>
                                @elseif(session('user_type') == 'institution')
                                <li><a class="dropdown-item" href="{{ route('institution.list') }}">Registros</a></li>
                                @elseif(session('user_type') == 'teacher')
                                <li><a class="dropdown-item" href="{{ route('teacher.list') }}">Turmas</a></li>
                                @endif
                                @if(session('user_type') == 'student')
                                <li><a class="dropdown-item" href="{{ route('AboutUsStudent') }}">Sobre nós</a></li>
                                @elseif(session('user_type') == 'institution')
                                <li><a class="dropdown-item" href="{{ route('AboutUsInstitution') }}">Sobre nós</a></li>
                                @elseif(session('user_type') == 'teacher')
                                <li><a class="dropdown-item" href="{{ route('AboutUsTeacher') }}">Sobre nós</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('contact') }}">Contato</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Sair</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
 <!-- Conteúdo Principal -->
 <main>
        @yield('content')
 </main>
 <!-- Rodapé -->
 <footer class="footer">
        <div class="container">
            <div class="row text-center text-md-start">
                <div class="col-md-3 mb-3">
                    <h5>Início</h5>
                    <ul class="list-unstyled">
                    @if(session('user_type') == 'student')
                    <a class="links" href="{{ route('HomeStudent') }}">
                        <li>Home</li>
                    </a>
                    @elseif(session('user_type') == 'teacher')
                    <a class="links" href="{{ route('HomeTeacher') }}">
                        <li>Home</li>
                    </a>
                    @elseif(session('user_type') == 'institution')
                    <a class="links" href="{{ route('HomeInstitution') }}">
                        <li>Home</li>
                    </a>
                    @endif
                        @if(session('user_type') == 'student')
                        <a class="links" href="{{ route('SearchSubject') }}">
                            <li>Atividades</li>
                        </a>
                        @elseif(session('user_type') == 'institution')
                        <a class="links" href="{{ route('institution.list') }}">
                            <li>Professores</li>
                        </a>
                        @elseif(session('user_type') == 'teacher')
                        <a class="links" href="{{ route('teacher.list') }}">
                            <li>Turmas</li>
                        </a>
                        @endif
                    </ul>
                </div>
                <div class="col-md-3 mb-3">
                    <h5>Sobre nós</h5>
                    <ul class="list-unstyled">
                    @if(session('user_type') == 'student')
                    <a class="links" href="{{ route('AboutUsStudent') }}">
                        <li>Empresa</li>
                    </a>
                    @elseif(session('user_type') == 'teacher')
                    <a class="links" href="{{ route('AboutUsTeacher') }}">
                        <li>Empresa</li>
                    </a>
                    @elseif(session('user_type') == 'institution')
                    <a class="links" href="{{ route('AboutUsInstitution') }}">
                        <li>Empresa</li>
                    </a>
                    @endif
                        <a class="links" href="{{ route('contact') }}">
                            <li>Contato</li>
                        </a>
                    </ul>
                </div>
                <div class="col-md-3 mb-3">
                    <h5>Suporte</h5>
                    <p>beemaysuporte@gmail.com</p>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="social-icons d-flex align-items-center justify-content-center">
                        <a href="#" aria-label="Instagram"><i class="links bi bi-instagram"></i></a>
                        <a href="#" aria-label="Gmail"><i class="links bi bi-envelope-fill"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="links bi bi-linkedin"></i></a>
                    </div>
                    <div class="button d-flex align-items-center justify-content-center">
                        <button class="buttonHover btn btn-contact mt-3"><a class="link-contact" href="{{ route('contact') }}">Contate-nos</a></button>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script> new window.VLibras.Widget('https://vlibras.gov.br/app'); </script>

</body>
</html>