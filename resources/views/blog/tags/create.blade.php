@extends('layouts.blog')

@section('content')
    <div
        class="e2-responds-to-dark-mode e2-external-drop-target e2-external-drop-target-body e2-external-drop-target-altable">
        <div class="common">
            <div class="content">
                <div class="e2-heading">
                    <span class="admin-links admin-links-floating admin-links-sticky"></span>
                    <h2>Изменение тега</h2>
                </div>
                <form id="form-note" action="{{ route('blog.tags.store') }}" enctype="multipart/form-data" method="post"
                      accept-charset="utf-8" autocomplete="off">
                    @csrf
                    <div class="form" id="e2-note-form-wrapper">

                        @include('includes.editor.componetns.input', ['big'=> true, 'title' => 'Тег', 'name' => 'name'])
                        @include('includes.editor.componetns.input', ['title' => 'В&nbsp;адресной строке', 'name' => 'slug'])
                        <div class="form-control">
                            <div class="form-label input-label"><label>Дополнительно</label></div>
                            @include('includes.editor.componetns.checkbox', ['name' => 'favorite', 'title' => ' Добавить в избранное'])
                            @include('includes.editor.componetns.checkbox', ['name' => 'navbar', 'title' => ' Показывать в навигации'])
                        </div>
                        @include('includes.editor.componetns.form_button', ['title' => 'Сохранить изменения'])
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
