@extends('includes.navbar.navbar')
<?php
$items = \App\Models\Tag::all()->where('navbar', true);
?>

@section('row')
<div class="menu-line menu-line-secondary menu-line-submenu">

    <div class="menu-items">
        @foreach($items as $item)
            <a class="menu-item" href="{{ route('blog.tags.show', $item->name) }}">
                <div class="menu-link">{{ $item->name }}</div>
            </a>
        @endforeach
    </div>

</div>
@endsection

@section('row-mob')
    <div class="mobile-menu-line mobile-menu-line-secondary mobile-menu-line-submenu">
        <div class="mobile-menu-items">
            @foreach($items as $item)
                <a class="mobile-menu-item" href="{{ route('blog.tags.show', $item->slug) }}">
                    <div class="mobile-menu-link">{{ $item->name }}</div>
                    <svg class="mobile-menu-arrow" xmlns="http://www.w3.org/2000/svg" width="8" height="8">
                        <path d="M0,0h8v8H6.5V1.5H0z"></path>
                    </svg>
                </a>
            @endforeach

{{--            <a class="mobile-menu-item" href="https://ilyabirman.ru/meanwhile/tags/design/"><div class="mobile-menu-link">Дизайн</div><svg class="mobile-menu-arrow" xmlns="http://www.w3.org/2000/svg" width="8" height="8"><path d="M0,0h8v8H6.5V1.5H0z"></path></svg></a><a class="mobile-menu-item" href="https://ilyabirman.ru/meanwhile/tags/ui/"><div class="mobile-menu-link">Интерфейс</div><svg class="mobile-menu-arrow" xmlns="http://www.w3.org/2000/svg" width="8" height="8"><path d="M0,0h8v8H6.5V1.5H0z"></path></svg></a><a class="mobile-menu-item" href="https://ilyabirman.ru/meanwhile/tags/world/"><div class="mobile-menu-link">Мир</div><svg class="mobile-menu-arrow" xmlns="http://www.w3.org/2000/svg" width="8" height="8"><path d="M0,0h8v8H6.5V1.5H0z"></path></svg></a><a class="mobile-menu-item" href="https://ilyabirman.ru/meanwhile/tags/negotiations/"><div class="mobile-menu-link">Переговоры</div><svg class="mobile-menu-arrow" xmlns="http://www.w3.org/2000/svg" width="8" height="8"><path d="M0,0h8v8H6.5V1.5H0z"></path></svg></a><a class="mobile-menu-item" href="https://ilyabirman.ru/meanwhile/tags/russian-language/"><div class="mobile-menu-link">Русский язык</div><svg class="mobile-menu-arrow" xmlns="http://www.w3.org/2000/svg" width="8" height="8"><path d="M0,0h8v8H6.5V1.5H0z"></path></svg></a><a class="mobile-menu-item" href="https://ilyabirman.ru/meanwhile/tags/books/"><div class="mobile-menu-link">Книги</div><svg class="mobile-menu-arrow" xmlns="http://www.w3.org/2000/svg" width="8" height="8"><path d="M0,0h8v8H6.5V1.5H0z"></path></svg></a><a class="mobile-menu-item" href="https://ilyabirman.ru/meanwhile/tags/economy/"><div class="mobile-menu-link">Экономика</div><svg class="mobile-menu-arrow" xmlns="http://www.w3.org/2000/svg" width="8" height="8"><path d="M0,0h8v8H6.5V1.5H0z"></path></svg></a><a class="mobile-menu-item" href="https://ilyabirman.ru/meanwhile/tags/philosophy/"><div class="mobile-menu-link">Философия</div><svg class="mobile-menu-arrow" xmlns="http://www.w3.org/2000/svg" width="8" height="8"><path d="M0,0h8v8H6.5V1.5H0z"></path></svg></a><a class="mobile-menu-item" href="https://ilyabirman.ru/meanwhile/tags/talks/"><div class="mobile-menu-link">Доклады</div><svg class="mobile-menu-arrow" xmlns="http://www.w3.org/2000/svg" width="8" height="8"><path d="M0,0h8v8H6.5V1.5H0z"></path></svg></a>--}}
            <a class="mobile-menu-item" href="/meanwhile/found/штангенциркуль/" style="box-shadow: none; background: none"><span style="display: inline-block; width: 32px; height: 32px"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path stroke="none" fill-rule="evenodd" clip-rule="evenodd" d="M16 14.5l-4.399-4.399a6.212 6.212 0 001.148-3.602 6.25 6.25 0 10-12.5 0 6.25 6.25 0 006.251 6.25 6.212 6.212 0 003.602-1.148L14.5 16l1.5-1.5zM1.25 6.501a5.251 5.251 0 1110.502 0 5.251 5.251 0 01-10.502 0z"></path></svg></span></a>
        </div>
    </div>
@endsection
