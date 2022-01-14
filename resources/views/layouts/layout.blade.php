<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UFP') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min/css') }} rel="stylesheet"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>
<body class="d-flex flex-column min-vh-100">
    <div id="app">


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="#">
                <img src="https://www.ufp.pt/app/uploads/2019/02/logoufp-300x120.png" width="auto" height="30" alt="">
        </a>

        @guest
        @else
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">

                    @if (Auth::user()->type == '1')
                        <a class="nav-link" href="{{route('home')}}">Home</a>
                    @endif
                    @if (Auth::user()->type == '2')
                        <a class="nav-link" href="{{route('teacher.home')}}">Home</a>
                    @endif
                    @if (Auth::user()->type == '3')
                        <a class="nav-link" href="{{route('staff.home')}}">Home</a>
                    @endif
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="/rooms">Classrooms</a>
                    </li>

                    <li class="nav-item active">
                        @if (Auth::user()->type == '2' || Auth::user()->type == '3')
                            <a class="nav-link" href="/users">Users</a>
                        @endif
                    </li>

                </ul>
            </div>

        @endguest

        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
            @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif

                @else
                    <li class="nav-item">
                        @if (Auth::user()->type == '1')
                            <a class="nav-link">Hello, {{ Auth::user()->name }} (Student)</a>
                        @endif

                        @if (Auth::user()->type == '2')
                            <a class="nav-link">Hello, {{ Auth::user()->name }} (Teacher)</a>
                        @endif

                        @if (Auth::user()->type == '3')
                            <a class="nav-link">Hello, {{ Auth::user()->name }} (Staff)</a>
                        @endif
                    </li>

                    <a class="nav-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                @endguest
            </ul>
        </div>


    </nav>


        <main class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @yield('content')


                    </div>
                </div>
            </div>
        </main>






    </div>
</body>

<footer class="bg-light text-center text-lg-start mt-auto">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    Laboratório Programação | Engenharia Software<br>
    Universidade Fernando Pessoa <br>
    Felipe Galvão | Gonçalo Paiva
    </div>
</footer>

</html>

