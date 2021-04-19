@extends('layouts.blog')

@section('content')
    Поиск
    @foreach($posts as $post)
        @include('includes.post', ['post' => $post])
    @endforeach
@endsection
