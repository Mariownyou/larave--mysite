<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Отдельный пост, для узкого круга лиц" />
    <meta name="og:description" content="Отдельный пост, для узкого круга лиц" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $post->title }}" />
    <meta property="og:url" content="https://levakondratev.ru/" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $post->title }}</title>
    <link rel="shortcut icon" href="/i/logo.jpg" />

    <!-- Scripts -->

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/editor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/core.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" class="frame">
    <header>
        <nav class="menu-container menu-container_hidden" id="menu-container">
            <div class="menu">
                <div class="menu-top">
                    <a class="menu-logo-gap"></a>
                    <a class="menu-logo" href="">
                        <div class="menu-photo"></div>
                        <div class="menu-item">
                            <div class="menu-link">Лева Кондратьев</div>
                        </div>
                    </a>
                    <div class="menu-line menu-line-main">
                        <div class="menu-blogpost" id="menu-blogpost"></div>
                    </div>
                </div>
            </div>
        </nav>
        <nav class="mobile-menu-container">
            <input class="mobile-menu-toggler" id="mobile-menu-toggler" type="checkbox">
            <div class="mobile-menu">
                <a class="mobile-menu-logo" id="mobile-menu-logo">
                    <div class="mobile-menu-photo"></div>
                </a>
                <a class="mobile-menu-item mobile-menu-item-hidden">
                    <div class="mobile-menu-link">Лева Кондратьев</div>
                </a>

                <a class="mobile-menu-item mobile-menu-item-visible">
                    <div class="mobile-menu-link">Лева Кондратьев</div>
                </a>
            </div>
        </nav>
    </header>
    <div class="page-title"></div>

    <main class="margins">
        @include('includes.post', ['post' => $post])
    </main>
</div>
</body>
</html>
