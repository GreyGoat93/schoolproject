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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row" style="min-height:100vh;">
            <div class="col-md-2 bg-primary p-0">
                <ul class="list-group">
                    <li class="list-group-item rounded-0"><a href="{{route('user.index')}}">Users</a></li>
                    <li class="list-group-item rounded-0"><a href="{{route('user.create', ['role' => 'student'])}}">Create New Student</a></li>
                    <li class="list-group-item rounded-0"><a href="{{route('user.create', ['role' => 'teacher'])}}">Create New Teacher</a></li>
                    <li class="list-group-item rounded-0"><a href="{{route('classroom.create')}}">Create New Classroom</a></li>
                    <li class="list-group-item rounded-0"><a href="{{route('lesson.create')}}">Create New Lesson</a></li>
                    <li class="list-group-item rounded-0"><a href="{{route('thl.create')}}">Attend a Teacher To Lesson</a></li>
                </ul>
            </div>

            <main class="col-md-10" style="background:white;">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>