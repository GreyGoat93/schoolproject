<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar bg-secondary">
        <div class="container">
            <div class="navbar-brand">
                <h3 class="text-dark p-0 m-0">
                    SchoolProject
                </h3>
            </div>
            <div>
                @guest
                    <a href="{{route('login')}}" class="text-light">Login</a>
                @else
                    <a href="{{route('logout')}}" class="text-light" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                @endguest
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>
