<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Título, definido nas variáveis de ambiente do Laravel (.env) -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <style>

        .btn-inscricao {
            background-color: #ffffff;
            color: #636b6f !important;
        }

        .btn-inscricao:hover {
            box-shadow: 0 4px 8px 4px rgba(0,0,0,0.2) !important;
            font-weight: bold;
            background-color: #F2F2F2;
        }

        .card-t {
            box-shadow: 0 4px 8px 4px rgba(0,0,0,0.2) !important;
            transition: 0.3s !important;
            border-radius: 2px !important;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .card-t-green {
            background-color: #1ce21c;
        }

        .card-t-red {
            background-color: #d37544;
        }

        .card-t a {
            color: #ffffff;
        }

        .card-t:hover {
            box-shadow: 0 8px 16px 4px rgba(0,0,0,0.2) !important;
        }

        .content-card-t {
            padding: 16px !important;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="/candidato">
                        <img src="{{ asset('/img/logo_unimontes_preto_simples.png') }}" alt="" class="logo-img">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">

                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('candidato.home') }}"><i class="fa fa-home"></i>&nbsp;Página Inicial</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>&nbsp;Área do candidato</a></li>
                            <li><a href="{{ route('register') }}"><i class="fas fa-pencil-alt"></i>&nbsp;Cadastro</a></li>
                            <li><a href="{{ route('admin.login.form') }}"><i class="fas fa-unlock-alt"></i>&nbsp;Administrador</a></li>
                        @else

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->nome }} <i class="fas fa-caret-square-down"></i>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('candidato.perfil.edit', \Auth::user()->id) }}">
                                            <i class="fas fa-user"></i> Perfil
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.logout') }}">
                                            <i class="fas fa-sign-in-alt"></i> Sair
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success bg-green-jungle bg-font-green-jungle border-green-jungle">
                            <i class="fa fa-check-circle" aria-hidden="true"></i> <strong> SUCESSO! </strong> {{ $message }}
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger bg-red-mint bg-font-red-mint border-red-mint">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i> <strong> ERRO: </strong> {{ $message }}
                        </div>
                    @endif
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>
                                <i class="fas fa-users"></i>&nbsp;{{ config('app.name', 'Processo de Transferência Externa') }}
                                <strong>
                                    {{ (session()->exists('processoSeletivoAtivo')) ? '- ' . session('processoSeletivoAtivo') : '' }}
                                </strong>
                            </h3>
                        </div>
                        <div class="panel-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/jquery-inputmask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/fontawesome-all.js') }}"></script>
</body>
</html>
