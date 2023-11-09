

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-danger bg-danger navbar-laravel">
            <div class="container">
                <a class="navbar-brand" style="color:#ffffff" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ Request::is('catalog') && ! Request::is('catalog/create')? 'active' : ''}}">
                            <a class="nav-link" style="color:#ffffff" href="{{url('/catalog')}}">
                                <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                                Catálogo
                            </a>
                        </li>

                        <li class="nav-item {{  Request::is('catalog/create') ? 'active' : ''}}">
                            <a class="nav-link" style="color:#ffffff" href="{{url('/catalog/create')}}">
                                <span>&#10010;</span> Nueva película
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#ffffff">
                                Categorias
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Accion</a></li>
                                <li><a class="dropdown-item" href="#">Animacion Kids</a></li>
                                <li><a class="dropdown-item" href="#">Animes</a></li>
                                <li><a class="dropdown-item" href="#">Aventuras</a></li>
                                <li><a class="dropdown-item" href="#">Ciencia Ficcion</a></li>
                                <li><a class="dropdown-item" href="#">Comedia</a></li>
                                <li><a class="dropdown-item" href="#">Cristianos</a></li>
                                <li><a class="dropdown-item" href="#">Documentales</a></li>
                                <li><a class="dropdown-item" href="#">Doramas</a></li>
                                <li><a class="dropdown-item" href="#">Dramas</a></li>
                                <li><a class="dropdown-item" href="#">Educativos</a></li>
                                <li><a class="dropdown-item" href="#">Familiar</a></li>
                                <li><a class="dropdown-item" href="#">Fantasia</a></li>
                                <li><a class="dropdown-item" href="#">Historia</a></li>
                                <li><a class="dropdown-item" href="#">Misterio</a></li>
                                <li><a class="dropdown-item" href="#">Novelas</a></li>
                                <li><a class="dropdown-item" href="#">Romanticas</a></li>
                                <li><a class="dropdown-item" href="#">Suspenso</a></li>
                                <li><a class="dropdown-item" href="#">Terror</a></li>
                                <!-- Agrega más elementos de dropdown según sea necesario -->
                            </ul>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#ffffff">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
