@extends('layouts.blog')

@section('content')
    <div class="e2-note">
        @include('includes.post', ['post' => $post])
    </div>
    @include('includes.editor.componetns.button', ['title' => 'Опубликовать заметку'])
@endsection
