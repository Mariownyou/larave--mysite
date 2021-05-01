<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{--  Мета для соцсетей  --}}
    <link rel="shortcut icon" href="/i/logo-math.png" />
    <meta name="og:description" content="Главная страничка по математике" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Лева — Математика" />
    <meta property="og:url" content="https://levakondratev.ru/" />

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src = "//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    <script src="{{ asset('js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('js/editor.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/editor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/core.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/school/core.css') }}" rel="stylesheet">

    <title>Лева — Математика</title>
</head>
<body>
<nav class="school-nav">
    <a class="mobile-menu-item mobile-menu-item-visible navbar-link" href="{{ route('school.math.index') }}">
        <div class="school-nav--title">Математика</div>
    </a>
</nav>
@yield('content')

@stack('scripts')
</body>
</html>
