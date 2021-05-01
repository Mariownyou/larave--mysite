@extends('layouts.app')
<?php
$tag = \App\Models\Tag::where('name', 'Литература')->first();
$posts = $tag->posts;
?>

@section('page-title')
    Школа
@endsection

@section('content')
    @include('includes.notes.gallery_3')
    <div class="e2-heading-meta">6 заметок&nbsp;&nbsp;&nbsp;См. также:&nbsp;&nbsp;<a
            href="https://ilyabirman.ru/meanwhile/tags/reading/" class="e2-tag">чтиво</a> &nbsp; <a
            href="{{ route('blog.tags.show', 'literature') }}" class="e2-tag">Литература</a> &nbsp; <a
            href="{{ route('blog.tags.show', 'school') }}" class="e2-tag">Школа</a> &nbsp; <a
            href="{{ route('blog.tags.show', 'homework') }}" class="e2-tag">Домашка</a>
    </div>
    <div class="b-list-in-columns">
        <h2>Информатика</h2>
        <ul>
            <li><a href="https://laughing-brown-bfba1a.netlify.app/">Задание 1</a></li>
            <li><a href="https://trusting-mclean-0538d9.netlify.app/" class="">Задание 2</a></li>
        </ul>
        <h2>Литература</h2>
        <ul>
            @foreach($posts as $post)
                <li>
                    <a href="{{ route('blog.posts.show', $post) }}">{{ $post->title }}</a>
                </li>
            @endforeach
        </ul>
        <h2>Математика</h2>
        <ul>
            <li>
                <a href="{{ route('school.math.index') }}">Домашка и теория</a>
            </li>
        </ul>
    </div>
@endsection
