@extends('layouts.math')

@section('content')
    @if(@!$posts)
        <?php
            $posts = \App\Models\MathPost::all();
        ?>
    @endif

    <div class="content-container">
        <input placeholder="Найти номер" class="search-input">
        <div class="section-title">
            <h1 class="section-title--title">Номера</h1>
            <div class="admin-panel">
                <a href="{{ route('school.math.n.create') }}" class="nu">
                    <span class="e2-svgi">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path stroke="none" d="M14 7H9V2H7v5H2v2h5v5h2V9h5z"></path>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
        <div class="e2-tags">
            @foreach($posts as $post)
                <a href="{{ route('school.math.n.show', $post->id) }}" class="e2-tag">{{ $post->title }}</a>
            @endforeach
        </div>

    </div>
{{--            {{ gettype(json_decode($post->files)) }}--}}
{{--            {{ gettype(json_decode($post->files)[0]->type) }}--}}
{{--            @foreach(json_decode($post->files) as $file)--}}
{{--                <h4>{{ $file->type }}</h4>--}}
{{--                <p>{{ $file->path }}</p>--}}
{{--                <img width="50px" height="50px" src="{{ url('storage/'.$file->path) }}" alt="Задача: {{ $post->title }}">--}}
{{--            @endforeach--}}
@endsection
