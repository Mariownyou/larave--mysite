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
                <form id="form-note" action="@actions/note-process/" enctype="multipart/form-data" method="post"
                      accept-charset="utf-8" autocomplete="off">
                    <a id="e2-note-livesave-action" href="@ajax/note-livesave/"></a>

                    <div class="form" id="e2-note-form-wrapper">

                        @include('includes.editor.title')
                        @include('includes.editor.content')
                        @include('includes.editor.tags')

                        <div class="form-control">
                            <div class="form-element">
                                <button type="submit" id="submit-button" class="e2-button e2-submit-button"
                                        tabindex="10" disabled="">
                                    Сохранить и посмотреть </button>
                                <span class="e2-keyboard-shortcut e2-keyboard-shortcut_visible"
                                      id="submit-keyboard-shortcut">Ctrl +
                                Enter</span>
                                &nbsp;&nbsp;&nbsp;
                                <span class="e2-svgi" id="note-saving" style="display: none"><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                                    <circle r="39" cx="50" cy="50" transform="rotate(-90 50 50)" stroke-width="6"
                                            fill="none" stroke-dasharray="245" stroke-dashoffset="61">
                                        <animateTransform attributeName="transform" type="rotate" from="0 50 50"
                                                          to="360 50 50" dur="1333ms" begin="indefinite" repeatCount="1">
                                        </animateTransform>
                                    </circle>
                                </svg></span><span id="note-saved" class="e2-svgi" style="display: none"><svg
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                    <path stroke="none" d="M1 9.034l4.517 5.547L15 2.42V.92L5.526 13.157 1 7.646z">
                                    </path>
                                </svg></span>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
