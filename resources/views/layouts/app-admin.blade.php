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
</head>
<body>

    @php
        /** @var \Illuminate\Database\Eloquent\Model $processosSeletivos */
        $processosSeletivos = \App\Models\ProcessoSeletivo::ativos()->orderBy('created_at', 'desc')->get();
    @endphp

    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top">
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
                    <a class="navbar-brand" href="{{ url('/admin') }}">
                        <img src="{{ asset('/img/logo_unimontes_branco_simples.png') }}" alt="" class="logo-img" width="55px">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">

                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if ( ! Auth::guard('admin')->check())
                            <li><a href="{{ route('admin.login.form') }}"><i class="fas fa-unlock-alt"></i>&nbsp;Entrar</a></li>
                        @else

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <form>
                                        <label>Processo Seletivo: </label>
                                        <select name="processo_seletivo" id="processo_seletivo" class="processo_seletivo">
                                            @foreach($processosSeletivos as $ps)
                                                <option value="{{ $ps->titulo }}" {{ ( session()->get('processoSeletivoAtivo') == $ps->titulo ) ? 'selected="selected"' : '' }} style="background-color: #222222">{{ $ps->titulo }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </a>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ (Auth::guard('admin')->check()) ? Auth::guard('admin')->user()->nome : '' }} <i class="fas fa-caret-square-down"></i>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('admin.logout.submit') }}">
                                            Sair <i class="fas fa-sign-in-alt"></i>
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
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/fontawesome-all.js') }}"></script>
</body>
</html>
