@extends('layouts.blog')

@section('content')
    <div
        class="e2-responds-to-dark-mode e2-external-drop-target e2-external-drop-target-body e2-external-drop-target-altable">
        <div class="common">
            <div class="content">
                <div class="e2-heading">
                    <span class="admin-links admin-links-floating admin-links-sticky"></span>
                    <h2>Новая заметка</h2>
                </div>
                <form id="form-note" action="{{ route('blog.posts.store') }}" enctype="multipart/form-data" method="post"
                      accept-charset="utf-8" autocomplete="off">
                    @csrf
                    <a id="e2-note-livesave-action" href="@ajax/note-livesave/"></a>

                    <div class="form" id="e2-note-form-wrapper">

                        @include('includes.editor.title')
                        @include('includes.editor.components.content')
                        @include('includes.editor.tags')
                        @include('includes.editor.button')

                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
