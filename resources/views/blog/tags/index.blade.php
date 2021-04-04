@extends('layouts.app')

@section('page-title')
    Теги
@endsection

@section('content')
    <div class="e2-tags">
        @foreach($tags as $tag)
            <a href="{{ route('blog.tags.show', $tag->slug) }}" class="e2-tag">{{ $tag->name }}</a>
        @endforeach
    </div>
@endsection
