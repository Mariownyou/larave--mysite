<div class="spotlight margins">
  <span class="admin-links-floating">
    <span class="admin-menu admin-links" id="e2-author-menu">
        @guest
        @else
            <span class="admin-icon e2-new-note-item" title="Новая" id="e2-new-note-item">
                <a href="{{ route('blog.posts.create') }}" class="nu">
                  <span class="e2-svgi"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path stroke="none" d="M14 7H9V2H7v5H2v2h5v5h2V9h5z"></path></svg>
                    <span class="e2-unsaved-led" style="display: none"></span>
                  </span>
                </a>
            </span>

            <span class="admin-icon" id="e2-drafts-item">
                <span id="e2-drafts" title="Черновики (4)">
                  <a href="{{ route('blog.drafts.index') }}" class="nu">
                    <span class="e2-svgi">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                            <path stroke="none" d="M3 3h4v4H3zM9 3h4v4H9zM3 9h4v4H3zM9 9h4v4H9z"></path>
                        </svg>
                        <span class="e2-unsaved-led" style="display: none"></span>
                    </span>
                  </a>
                </span>
            </span>

            <span class="admin-icon">
                <a href="#" class="nu">
                  <span class="e2-svgi"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path stroke="none" fill-rule="evenodd" clip-rule="evenodd" d="M8.018 1.747a6.248 6.248 0 0 0-6.249 6.25 6.25 6.25 0 1 0 6.249-6.25zm0 11a4.75 4.75 0 0 1-4.75-4.75 4.75 4.75 0 1 1 4.75 4.75z"></path><g stroke="none" fill-rule="evenodd" clip-rule="evenodd"><path d="M2.098 13.285l1.75-.839L2.63 10.86l-1.263 1.474zM14.632 3.667l-.73-.952-1.751.84 1.217 1.586z"></path></g><g stroke="none" fill-rule="evenodd" clip-rule="evenodd"><path d="M.246 9.626l1.935.149-.261-1.983-1.831.645zM15.91 7.564l-.156-1.19-1.937-.148.261 1.983z"></path></g><g stroke="none" fill-rule="evenodd" clip-rule="evenodd"><path d="M.472 5.532l1.601 1.096.766-1.848L.93 4.423zM15.068 11.578l.46-1.109-1.603-1.097-.765 1.848z"></path></g><g stroke="none" fill-rule="evenodd" clip-rule="evenodd"><path d="M2.715 2.098l.839 1.75L5.14 2.631 3.666 1.367zM12.333 14.633l.952-.73-.84-1.752-1.586 1.218z"></path></g><g stroke="none" fill-rule="evenodd" clip-rule="evenodd"><path d="M6.374.247l-.149 1.935 1.983-.261L7.563.089zM8.436 15.91l1.19-.155.148-1.937-1.983.261z"></path></g><g stroke="none" fill-rule="evenodd" clip-rule="evenodd"><path d="M10.468.472L9.372 2.074l1.848.765.357-1.908zM4.422 15.069l1.109.46 1.097-1.603-1.848-.766z"></path></g></svg>
                  </span>
                </a>
            </span>
        @endguest
    </span>
  </span>
</div>

@push('styles')
    <style>

    </style>
@endpush
