@extends('layouts.blog')

@section('content')
    <div class="content">
        @include('includes.post', ['post' => $post])
        <form method="post" id="form">
            <input type="hidden" value="{{ $post->id }}" id="post_id">
            @include('includes.editor.components.button', ['title' => 'Опубликовать заметку'])
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#form').on('submit', function (e) {
                e.preventDefault();
                console.log($('#post_id').val())

                $.ajax({
                    type: 'POST',
                    url: '{{ route('blog.publish') }}',
                    data: {
                        id: $('#post_id').val(),
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (result) {
                        console.log(result);
                        redirect(1);
                    }
                });
            });
        });

        function redirect(url) {
            //window.location.replace("http://localhost:8000/posts");
            // prod
            window.location.replace("{{ route('blog.posts.index') }}");
            //document.location.href='http://stackoverflow.com'
        }
    </script>
@endpush
