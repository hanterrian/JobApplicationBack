<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(Auth::check())
        <meta name="user" content="{{ Auth::id() }}">
    @endif

    @livewireStyles

<!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    {!! SEO::generate() !!}
</head>
<body>
<div class="container-fluid" id="app">
    <div class="main-navbar">
        <a href="{{ route('home') }}" class="main-navbar__brand">
            App
        </a>

        <div class="main-navbar__menu-toggle">
            <button class="toggle-button" aria-label="Menu">
                <svg class="h-6 w-6 text-dark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="24" height="24">
                    <path d="M4 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"/>
                </svg>
            </button>
        </div>

        <div class="main-navbar__menu-container">
            <div class="main-navbar__menu-container-list">
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('orders.index') }}">Orders</a>
                    </li>

                    @if(Auth::check())
                        <li>
                            <a href="{{ route('logout') }}">Logout</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <x-flash-message/>

    @yield('content')
</div>

@livewireScripts
</body>
</html>
