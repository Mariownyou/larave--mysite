<div class="spotlight margins">
  <span class="admin-links-floating">
    <span class="admin-menu admin-links" id="e2-author-menu">
        @guest
        @else
            <span class="admin-icon e2-new-note-item" title="Новая" id="e2-new-note-item">
                <a href="{{ route('blog.create') }}" class="nu">
                  <span class="e2-svgi"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path stroke="none" d="M14 7H9V2H7v5H2v2h5v5h2V9h5z"></path></svg>
                    <span class="e2-unsaved-led" style="display: none"></span>
                  </span>
                </a>
            </span>

             <span class="admin-icon" id="e2-drafts-item">
                <span id="e2-drafts" title="Черновики (4)">
                  <a href="https://demo.blogengine.ru/drafts/" class="nu">
                    <span class="e2-svgi"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path stroke="none" d="M3 3h4v4H3zM9 3h4v4H9zM3 9h4v4H3zM9 9h4v4H9z"></path></svg><span class="e2-unsaved-led" style="display: none"></span></span>
                  </a>
                </span>
            </span>

            <span class="admin-icon">
                <a href="https://demo.blogengine.ru/settings/" class="nu">
                  <span class="e2-svgi"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path stroke="none" fill-rule="evenodd" clip-rule="evenodd" d="M8.018 1.747a6.248 6.248 0 0 0-6.249 6.25 6.25 6.25 0 1 0 6.249-6.25zm0 11a4.75 4.75 0 0 1-4.75-4.75 4.75 4.75 0 1 1 4.75 4.75z"></path><g stroke="none" fill-rule="evenodd" clip-rule="evenodd"><path d="M2.098 13.285l1.75-.839L2.63 10.86l-1.263 1.474zM14.632 3.667l-.73-.952-1.751.84 1.217 1.586z"></path></g><g stroke="none" fill-rule="evenodd" clip-rule="evenodd"><path d="M.246 9.626l1.935.149-.261-1.983-1.831.645zM15.91 7.564l-.156-1.19-1.937-.148.261 1.983z"></path></g><g stroke="none" fill-rule="evenodd" clip-rule="evenodd"><path d="M.472 5.532l1.601 1.096.766-1.848L.93 4.423zM15.068 11.578l.46-1.109-1.603-1.097-.765 1.848z"></path></g><g stroke="none" fill-rule="evenodd" clip-rule="evenodd"><path d="M2.715 2.098l.839 1.75L5.14 2.631 3.666 1.367zM12.333 14.633l.952-.73-.84-1.752-1.586 1.218z"></path></g><g stroke="none" fill-rule="evenodd" clip-rule="evenodd"><path d="M6.374.247l-.149 1.935 1.983-.261L7.563.089zM8.436 15.91l1.19-.155.148-1.937-1.983.261z"></path></g><g stroke="none" fill-rule="evenodd" clip-rule="evenodd"><path d="M10.468.472L9.372 2.074l1.848.765.357-1.908zM4.422 15.069l1.109.46 1.097-1.603-1.848-.766z"></path></g></svg>
                  </span>
                </a>
            </span>
        @endguest


    </span>
  </span>
    <form id="e2-search" class="search-field search-field-right-anchored e2-enterable" action="https://demo.blogengine.ru/@actions/search/" method="post" accept-charset="utf-8">
        <label class="search-field__label">
            <input class="search-field__input" type="search" inputmode="search" name="query" id="query" value="">

            <span class="search-field__zoom-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path stroke="none" fill-rule="evenodd" clip-rule="evenodd" d="M16 14.5l-4.399-4.399a6.212 6.212 0 0 0 1.148-3.602 6.25 6.25 0 1 0-12.5 0 6.25 6.25 0 0 0 6.251 6.25 6.212 6.212 0 0 0 3.602-1.148L14.5 16l1.5-1.5zM1.25 6.501a5.251 5.251 0 1 1 10.502 0 5.251 5.251 0 0 1-10.502 0z"></path></svg>
            </span>

            <a class="nu search-field__tags-icon" href="{{ route('home') }}" title="Теги">
                <span class="e2-svgi"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path stroke="none" d="M6.938 16.001c-.43 0-.891-.16-1.32-.59L.607 10.38C-.406 9.367.037 8.191.581 7.647l6.538-6.501C7.145 1.116 8.176 0 9.427 0h4.044c1.153 0 2.5.659 2.5 2.516v3.991c0 1.167-1.029 2.229-1.146 2.347L8.32 15.415c-.308.309-.818.586-1.382.586zM9.427 1c-.801 0-1.578.828-1.586.837L1.287 8.354c-.146.152-.587.706.027 1.319l5.011 5.031c.589.59 1.137.15 1.29.003l6.501-6.559c.238-.241.855-1.002.855-1.642v-3.99c0-1.318-.94-1.516-1.5-1.516H9.427zm1.571 5.754c-.468 0-.907-.183-1.238-.515a1.765 1.765 0 0 1 0-2.487c.661-.664 1.814-.664 2.475 0 .331.332.513.774.513 1.243 0 .469-.182.911-.513 1.243a1.73 1.73 0 0 1-1.237.516z"></path></svg></span>
            </a>
        </label>
    </form>

</div>

@push('styles')
    <style>

    </style>
@endpush
