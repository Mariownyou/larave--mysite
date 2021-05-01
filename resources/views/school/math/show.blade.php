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
    </div>
@endsection
