@extends('layouts.blog')

@section('page-title')
@endsection

@section('content')
    <div class="e2-heading">
        @include('includes.admin.admin_edit_tag', $tag)
        <h2>Тег: {{ $tag->name }}</h2>
        <div class="e2-heading-meta">Заметок: {{ $tag->posts()->count() }}</div>
    </div>

    @foreach($tag->posts as $post)
        @if($post->published)
            @include('includes.post', ['post' => $post])
        @endif
    @endforeach
@endsection
