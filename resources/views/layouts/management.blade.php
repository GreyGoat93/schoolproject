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
    <div class="container-fluid">
        <div class="row" style="min-height:100vh;">
            <div class="col-2 bg-primary p-0">
                <ul class="list-group">
                    <li class="list-group-item rounded-0"><a href="{{route('management.createuser', ['role' => 'student'])}}">Create New Student</a></li>
                    <li class="list-group-item rounded-0"><a href="{{route('management.createuser', ['role' => 'teacher'])}}">Create New Teacher</a></li>
                </ul>
            </div>

            <main class="col-10 bg-secondary">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>