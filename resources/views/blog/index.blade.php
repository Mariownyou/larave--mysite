@extends('layouts.blog')

@section('page-title')
    Блог
@endsection

@section('content')
    @foreach($posts as $post)
        <article>
            <h1 class="e2-smart-title">
                {{ $post->title }}
            </h1>
            <div class="e2-note-text e2-text">
                {!! $post->content !!}
            </div>
            <div class="e2-note-meta">
                @foreach($post->tags as $tag)
                    <a href="{{ route('tags.show', $tag->slug) }}" class="e2-tag">{{ $tag->name }}</a>
                @endforeach
            </div>
        </article>
    @endforeach
@endsection
