@extends('layouts.math')

@section('content')
    <div class="content-container">
        <div class="e2-note">
            <h1 class="e2-smart-title">
                {{ $post->title }}
            </h1>
            <div class="e2-note-text e2-text">
                {{ $post->text }}
            </div>
            @foreach(json_decode($post->files) as $file)
                <div class="note-img">
                    <img class="note-img" src="{{ url('storage/'.$file->path) }}" alt="{{ $post->title }}">
                </div>
            @endforeach
        </div>
        <div class="e2-note-meta">
        <span><span class="e2-svgi"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M8 12.5C3 12.5.3 8.4.2 8.3L0 8l.1-.3C.2 7.6 2.5 3.5 8 3.5s7.8 4.1 7.8 4.3l.2.3-.2.2c-.1.2-2.8 4.2-7.8 4.2zM1.2 8c.7.8 3.1 3.5 6.8 3.5 3.8 0 6.1-2.7 6.8-3.5-.6-.9-2.6-3.5-6.8-3.5-4.2 0-6.2 2.6-6.8 3.5z" stroke="none"></path><path d="M8 10.5c-1.9 0-3.5-1.6-3.5-3.5S6.1 3.5 8 3.5s3.5 1.6 3.5 3.5-1.6 3.5-3.5 3.5zm0-6C6.6 4.5 5.5 5.6 5.5 7S6.6 9.5 8 9.5s2.5-1.1 2.5-2.5S9.4 4.5 8 4.5z" stroke="none"></path><circle cx="6.7" cy="6.5" r="1.5"></circle></svg></span>&nbsp;{{ $post->views }}</span>
                &nbsp;&nbsp;
                <span title="{{ $post->created_at->format('Y.m.d H:i:s') }}">{{ $post->created_at->diffForHumans() }}</span> &nbsp;
                @foreach($post->tags as $tag)
                    <a href="{{ route('blog.tags.show', $tag) }}" class="e2-tag ">{{ $tag->name }}</a> &nbsp;
                @endforeach
            </div>
    </div>
@endsection
