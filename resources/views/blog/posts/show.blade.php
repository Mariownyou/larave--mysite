@extends('layouts.blog')

@section('content')
    <div class="content">
        @include('includes.post', ['post' => $post])
    </div>
@endsection
