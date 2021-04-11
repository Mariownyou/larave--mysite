<div class="form-control">
    <div class="form-subcontrol">

        <div class="form-label form-label-sticky input-label">
            <label>
                Текст <a href="http://blogengine.ru/help/text/" target="_blank"
                         class="nu e2-admin-link"><span class="e2-svgi"><svg id="Layer_1"
                                                                             data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                                                             viewBox="0 0 16 16">
                                                <path
                                                    d="M5.27 5.39a2.82 2.82 0 0 1 .59-.94 2.65 2.65 0 0 1 .91-.62A3.08 3.08 0 0 1 8 3.61a3.76 3.76 0 0 1 1.42.23 2.76 2.76 0 0 1 .92.58 2.09 2.09 0 0 1 .5.75 2.14 2.14 0 0 1 .15.75 2.55 2.55 0 0 1-.15.95 2.31 2.31 0 0 1-.37.64 2.47 2.47 0 0 1-.53.49l-.51.37a2.37 2.37 0 0 0-.43.39l-.12.16a3.67 3.67 0 0 0-.11.67c0 .13-.22.23-.5.23h-.62c-.28 0-.5-.12-.5-.27a7.12 7.12 0 0 1 .07-.77 1.49 1.49 0 0 1 .13-.37 2.51 2.51 0 0 1 .38-.59 3 3 0 0 1 .46-.43q.24-.18.44-.36A1.62 1.62 0 0 0 9 6.64a1 1 0 0 0 .11-.54 1.09 1.09 0 0 0-.27-.82A1 1 0 0 0 8 5a1.16 1.16 0 0 0-.56.13 1.11 1.11 0 0 0-.38.34 1.44 1.44 0 0 0-.18.53v.19a.5.5 0 0 1-.52.42h-.81a.44.44 0 0 1-.45-.5 2.91 2.91 0 0 1 .17-.72zm3.09 5.15a.5.5 0 0 1 .5.5v.85a.5.5 0 0 1-.5.5h-.88a.5.5 0 0 1-.5-.5V11a.5.5 0 0 1 .5-.5z"
                                                    stroke="none"></path>
                                                <path
                                                    d="M8 0a8 8 0 1 0 8 8 8 8 0 0 0-8-8zm0 15a7 7 0 1 1 7-7 7 7 0 0 1-7 7z"
                                                    stroke="none"></path>
                                            </svg></span></a>
            </label>

            <div class="form-label-saveinfo">
                <span id="livesaving" style="display: none">Сохранение... <span class="e2-svgi"><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                            <circle r="39" cx="50" cy="50" transform="rotate(-90 50 50)"
                                    stroke-width="6" fill="none" stroke-dasharray="245"
                                    stroke-dashoffset="61">
                                <animateTransform attributeName="transform" type="rotate"
                                                  from="0 50 50" to="360 50 50" dur="1333ms" begin="indefinite"
                                                  repeatCount="1">
                                </animateTransform>
                            </circle>
                        </svg></span>
                </span>
                <span id="livesave-button"
                      class="e2-keyboard-shortcut e2-clickable-keyboard-shortcut e2-admin-link e2-keyboard-shortcut_visible"
                      style="display: none">Ctrl + S</span>
                <span class="e2-unsaved-led" style="display: none"></span>
            </div>
        </div>

        <div class="form-element">

            @if(@$edit)
                <textarea name="content"
                          class="required e2-text-textarea e2-textarea-autosize full-width height-16 e2-external-drop-target e2-external-drop-target-textarea e2-external-drop-target-altable"
                          id="text" tabindex="2" style="height: 396px;">{{ $post->content }}</textarea>
{{--                <editor v-bind:is-edit='true' v-bind:content="`{{ $post->content }}`"></editor>--}}
            @else
                <textarea name="content"
                class="required e2-text-textarea e2-textarea-autosize full-width height-16 e2-external-drop-target e2-external-drop-target-textarea e2-external-drop-target-altable"
                id="text" tabindex="2" style="height: 396px;"></textarea>
{{--                <editor></editor>--}}
            @endif
        </div>

    </div>

    <div class="form-subcontrol">
        <div class="form-element">
            <a id="e2-file-upload-action" href="@ajax/file-upload/"></a>
            <a id="e2-file-remove-action" href="@ajax/file-remove/"></a>

            <div id="e2-uploaded-image-prototype" class="e2-uploaded-image" style="display: none">
                <div class="e2-uploaded-image-inner e2-uploaded-image-inner_good">
                    <img src="" alt="">
                </div>
                <div class="e2-uploaded-image-inner e2-uploaded-image-inner_bad">
                    <span class="e2-uploaded-image-noimage"></span>
                </div>

                <div class="e2-popup-menu e2-uploaded-image-popup-menu">
                    <button type="button" class="e2-popup-menu-button">
                        <span class="e2-popup-menu-button-text">Действия</span>
                    </button>

                    <div class="e2-popup-menu-widget">
                        <div class="e2-popup-menu-widget-item e2-popup-menu-widget-item_info"
                             data-e2-popup-menu-action="do-not-close-popup-menu">
                                <span class="e2-popup-menu-widget-item-text">
                                    <span
                                        class="e2-popup-menu-widget-item-text-row e2-image-popup-menu-filename"></span>
                                    <span
                                        class="e2-popup-menu-widget-item-text-row e2-image-popup-menu-filesize"></span>
                                </span>
                        </div>

                        <hr class="e2-popup-menu-widget-separator">

                        <button type="button"
                                class="e2-popup-menu-widget-item e2-popup-menu-widget-item_remove"
                                data-e2-js-action="remove-image">
                                    <span class="e2-popup-menu-widget-item-icon">
                                        <span class="e2-toggle-state-off"><span class="e2-svgi"><svg
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                                    <path stroke="none" fill-rule="evenodd"
                                                          clip-rule="evenodd"
                                                          d="M3 3v10s0 1 1 1h8c1 0 1-1 1-1V3H3zm3 10H4V4h2v9zm3 0H7V4h2v9zm3 0h-2V4h2v9z">
                                                    </path>
                                                    <path d="M10 3V2H6v1H2v1h12V3z"></path>
                                                </svg></span></span>
                                        <span class="e2-toggle-state-thinking"><span class="e2-svgi"><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 100 100">
                                                    <circle r="39" cx="50" cy="50"
                                                            transform="rotate(-90 50 50)" stroke-width="6"
                                                            fill="none" stroke-dasharray="245"
                                                            stroke-dashoffset="61">
                                                        <animateTransform attributeName="transform"
                                                                          type="rotate" from="0 50 50" to="360 50 50"
                                                                          dur="1333ms" begin="indefinite" repeatCount="1">
                                                        </animateTransform>
                                                    </circle>
                                                </svg></span></span>
                                    </span>
                            <span class="e2-popup-menu-widget-item-text">Удалить</span>
                        </button>

                        <button type="button" class="e2-popup-menu-widget-item"
                                data-e2-js-action="paste-image">
                            <span class="e2-popup-menu-widget-item-icon"><span class="e2-svgi"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16">
                                        <style type="text/css">
                                            .st0 {
                                                fill-rule: evenodd;
                                                clip-rule: evenodd;
                                                fill: none
                                            }
                                        </style>
                                        <path stroke="none"
                                              d="M2 7H1V4c0-.6.4-1 1-1h3v1H2v3zM15 7h-1V4h-3V3h3c.6 0 1 .4 1 1v3zM14 13h-3v-1h3V9h1v3c0 .6-.4 1-1 1zM5 13H2c-.6 0-1-.4-1-1V9h1v3h3v1z">
                                        </path>
                                    </svg></span>
                            </span>
                            <span class="e2-popup-menu-widget-item-text">Вставить</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="e2-uploaded-images">
            </div>


            <div class="e2-upload-controls" data-e2-filename-prefix="">
                <div class="e2-admin-link e2-upload-controls-attach">
                    <span class="e2-admin-item e2-upload-controls-attach-icon">
                        <span class="e2-admin-item-icon">
                            <span class="e2-svgi">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                    <path stroke-linecap="round" stroke-miterlimit="10"
                                          d="M11 11l-3 3s-2.996 3.004-5.998.002S2 8 2 8l6.5-6.5s1.986-2.014 4 0c2 2 0 4 0 4L6 12s-1 1-2 0 0-2 0-2l6.5-6.5"
                                          fill="none"></path>
                                </svg>
                            </span>
                        </span>
                        <span class="e2-admin-item-text">Загрузить файл</span>
                    </span>
                    <label for="e2-upload-button" class="e2-upload-controls-attach-label">
                        <input type="file" multiple="multiple"
                               class="e2-upload-controls-attach-input" id="e2-upload-button">
                    </label>
                </div>
                <div class="e2-upload-controls-uploading e2-upload-controls-uploading_hidden">
                    <span class="e2-svgi e2-svgi_40">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                            <circle class="e2-progress" r="39" cx="50" cy="50"
                                    transform="rotate(-90 50 50)" stroke-width="6" fill="none"
                                    stroke-dasharray="245" stroke-dashoffset="220">
                                <animateTransform attributeName="transform" type="rotate"
                                                  from="0 50 50" to="360 50 50" dur="1333ms" begin="indefinite"
                                                  repeatCount="1">
                                </animateTransform>
                            </circle>
                        </svg>
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>

@push('scripts')
    <script>
        let title = document.getElementById('title');
        let content = document.getElementById('text');
        let post_id = '{{ @$post ? $post->id : null }}';
        let post = {
            title: title.value,
            text: content.value
        }

        if (post_id) {
            post_id = `copy-${post_id}`
        } else {
            post_id = 'new-copy'
        }

        console.log(post_id)
        if(localStorage.getItem(post_id)) {
            console.log('found')
            post = JSON.parse(localStorage.getItem(post_id))
            title.value = post.title
            content.value = post.text
        }

        title.addEventListener('input', () => {
            post.title = title.value
            console.log(post.title)
        })

        content.addEventListener('input', () => {
            post.text = content.value
            console.log(post.text)
        })

        document.addEventListener("keydown", function(e) {
            if ((window.navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)  && e.keyCode == 83) {
                e.preventDefault();
                // Process the event here (such as click on submit button)
                localStorage.setItem(post_id, JSON.stringify(post))
                console.log('saved');
            }
        }, false);

        console.log(content)

        window.onbeforeunload = function() {
            console.log('asdasd')
            localStorage.setItem(post_id, JSON.stringify(post))
        }
    </script>
@endpush
