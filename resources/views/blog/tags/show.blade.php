@extends('layouts.blog')

@section('page-title')
    {{ $tag->name }}
@endsection

@section('content')
    {{ $tag->name }}
    <a href="{{ route('tags.edit', $tag->slug) }}">Edit</a>
    @foreach($tag->posts as $post)
        <h2>{{ $post->title }}</h2>
    @endforeach
@endsection
