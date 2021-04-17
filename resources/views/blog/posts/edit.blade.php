@extends('layouts.blog')

@section('content')
    <div class="content">
        <div class="e2-heading">
        @include('includes.admin.admin_delete_button', ['method' => 'posts', 'obj' => $post])
            <h2>Правка заметки</h2>
        </div>
        <form id="form-note" action="{{ route('blog.posts.update', $post) }}" enctype="multipart/form-data" method="post" accept-charset="utf-8" autocomplete="off">
            @csrf
            @method('put')
            <input type="hidden" id="note-id" name="note-id" value="12">
            <input type="hidden" id="formatter-id" name="formatter-id" value="neasden">
            <input type="hidden" id="is-note-published" name="is-note-published" value="true">
            <input type="hidden" name="old-tags-hash" value="e4794f6b401469aeeeb1d9115c194af6">
            <input type="hidden" name="old-stamp" value="12.01.2021 23:00:00">
            <input type="hidden" id="action" name="action" value="edit">
            <input type="hidden" id="browser-offset" name="browser-offset" value="180">
            <script>
                d = new Date()
                document.getElementById('browser-offset').value = - d.getTimezoneOffset()
            </script>
            <a id="e2-note-livesave-action" href="https://demo.blogengine.ru/@ajax/note-livesave/"></a>
            <div class="form" id="e2-note-form-wrapper">
                @include('includes.editor.components.input_title', ['post' => $post])
                @include('includes.editor.content', ['post' => $post, 'edit' => true])
                @include('includes.editor.tags')
                <div class="form-control">
                    <div class="form-element">
                        <div class="e2-note-time-and-url">
                            <a href="javascript: return false" onclick="$ ('.e2-note-time-and-url').slideToggle(333); return false" class="e2-pseudolink e2-admin-link">Опубликована             по адресу .../{{ $post->slug  }}/
                                <span title="12 января 2021, 23:00, GMT+05:00">{{ $post->created_at }}</span>
                            </a>
                        </div>
                        <div class="e2-note-time-and-url" style="display: none">
                            <div class="form-subcontrol">
                                <textarea name="summary" class="e2-text-textarea e2-textarea-autosize width-4 height-2" id="summary" tabindex="5" placeholder="Краткое описание" style="height: 0px;"></textarea>
                                <div class="form-control-sublabel">
                                    Для поисковых систем, соцсетей и агрегаторов
                                </div>
                            </div>
                            <div class="form-subcontrol">
                                <input type="text" class="text required unedited width-2" autocomplete="off" tabindex="6" id="alias" name="alias" placeholder="" value="handset-metaphor">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-control">
                    <div class="form-element">
                        <button type="submit" id="submit-button" class="e2-button e2-submit-button" tabindex="10">
                            Сохранить изменения        </button>
                        <span class="e2-keyboard-shortcut" id="submit-keyboard-shortcut">Ctrl + Enter</span>
                        &nbsp;&nbsp;&nbsp;
                        <span class="e2-svgi" id="note-saving" style="display: none">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                     <circle r="39" cx="50" cy="50" transform="rotate(-90 50 50)" stroke-width="6" fill="none" stroke-dasharray="245" stroke-dashoffset="61">
                        <animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1333ms" begin="indefinite" repeatCount="1"></animateTransform>
                     </circle>
                  </svg>
               </span>
                        <span id="note-saved" class="e2-svgi" style="display: none">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                     <path stroke="none" d="M1 9.034l4.517 5.547L15 2.42V.92L5.526 13.157 1 7.646z"></path>
                  </svg>
               </span>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
