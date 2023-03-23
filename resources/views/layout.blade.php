<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="{{ mix('assets/css/style.css') }}" rel="stylesheet">
        <script src="{{ mix('assets/js/app.js') }}"></script>
    </head>
    <body class="d-flex flex-column h-100">
        <header>
            @auth
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="navbar-nav me-auto mb-2 mb-md-0 w-100">
                                <li class="nav-item">
                                    <a class="nav-link{{ request()->is('/') ? ' active' : '' }}" aria-current="page" href="/">Главная</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link{{ request()->is('history') ? ' active' : '' }}" href="{{ route('history')}}">История</a>
                                </li>
                                <li class="flex-grow-1 d-block"></li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout')}}">Выход</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            @endauth
        </header>
        <main class="flex-shrink-0">
            <div class="container">
                <h1 class="mt-5 text-center">{{ $title }}</h1>
            </div>
            @yield('content')
        </main>
        <footer class="footer mt-auto py-3">
           @include('alerts')
        </footer>
    </body>
</html>
