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
                <form id="form-note" action="{{ route('tags.update', $tag->slug) }}" enctype="multipart/form-data" method="post"
                      accept-charset="utf-8" autocomplete="off">
                    @csrf
                    @method('put')
                    <div class="form" id="e2-note-form-wrapper">

                        @include('includes.editor.componetns.input', ['big'=> true, 'title' => 'Тег', 'name' => 'name', 'value' => $tag->name])
                        @include('includes.editor.componetns.input', ['title' => 'В&nbsp;адресной строке', 'name' => 'slug', 'value' => $tag->slug])
                        <div class="form-control">
                            <div class="form-label input-label"><label>Дополнительно</label></div>
                            @include('includes.editor.componetns.checkbox', ['name' => 'favorite', 'title' => ' Добавить в избранное', 'value' => $tag->favorite])
                            @include('includes.editor.componetns.checkbox', ['name' => 'navbar', 'title' => ' Показывать в навигации', 'value' => $tag->navbar])
                        </div>
                        @include('includes.editor.componetns.button', ['title' => 'Сохранить изменения'])
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
