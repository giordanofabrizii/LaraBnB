<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- TomTomAPI -->
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.17.0/maps/maps-web.min.js"></script>
    <link rel="stylesheet" href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.17.0/maps/maps.css">
    <link rel="stylesheet" href="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.12/SearchBox.css">

    <!-- Scripts -->
    @yield('custom-script')
    <!-- Scripts -->


    @vite(['resources/sass/app.scss', 'resources/js/app.js', ])

    <!-- Custom CSS -->
    @yield('custom-scss')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">
                <a class="logo" href="{{ url('http://localhost:5174/') }}">
                    <img src="{{ asset('storage/icons/logo-verde.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul id="links" class="navbar-nav mx-auto">
                        <li title="Home">
                            <a href="{{Route('home')}}" class="{{ (Route::is('home') || (Route::is('welcome'))) ? 'active' : '' }}"><i class="fa-solid fa-qrcode"></i><span class="text">Home</span></a>
                        </li>
                        <li title="Appartamenti">
                            <a href="{{Route('apartments.index')}}" class="{{ Route::is('apartments.index') ? 'active' : '' }}"><i class="fa-regular fa-building"></i><span class="text">Appartamenti</span></a>
                        </li>
                        <li title="Messaggi">
                            <a href="{{Route('inbox')}}" class="{{ Route::is('inbox') ? 'active' : '' }}"><i class="fa-solid fa-comment"></i><span class="text">Messaggi</span></a>
                        </li>
                        <li title="Statistiche">
                            <a href="{{Route('statistics')}}" class="{{ Route::is('statistics') ? 'active' : '' }}"><i class="fa-solid fa-chart-simple"></i><span class="text">Statistiche</span></a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav profile">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" id="dark-mode">Dark Mode</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                                </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    @if(Auth::user()->image != null)
                                        <img src="{{ asset('storage/uploads/' . Auth::user()->image) }}" alt="profile picture">
                                    @else
                                        <article class="img"><span>{{Auth::user()->name[0]}}{{Auth::user()->lastname[0]}}</span></article>
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <button class="dropdown-item" id="dark-mode">Dark Mode</button>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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

    @yield('scripts')
</body>
</html>
