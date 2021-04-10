@extends('layouts.blog')

@section('page-title')
    <div class="e2-heading">
        <h2>Черновики</h2>
    </div>
@endsection

@section('content')
    @foreach($posts as $post)
        <div class="e2-draft-preview" id="e2-draft-2">
            <a href="{{ route('blog.drafts.show', $post) }}" class="e2-admin-link nu">
                <div class="e2-draft-preview-box">
                    <span class="e2-unsaved-led" style="display: none"></span>
                    <div class="e2-draft-preview-content">


                        <div class="e2-draft-preview-text">
                            {!! \App\Http\Controllers\BlogController::parseText($post->content) !!}
                        </div>
                    </div>
                </div>
                <u>{{ $post->title }}</u>
            </a>
        </div>
    @endforeach
@endsection
