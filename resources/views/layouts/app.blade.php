<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Лева Кондратьев</title>
    <link rel="shortcut icon" href="/i/logo.jpg" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/core.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div id="app" class="frame">
        @include('includes.navbar.navbar')

        <div class="page-title">
            <h1>@yield('page-title')</h1>
        </div>
        <main class="margins">
            @yield('content')
        </main>

        @include('includes.footer')
    </div>
</body>
</html>
