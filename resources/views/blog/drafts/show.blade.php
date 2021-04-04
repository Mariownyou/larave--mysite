@extends('layouts.blog')

@section('content')
    <div class="e2-note">
        @include('includes.post', ['post' => $post])
        <a href="{{ route('blog.preview', $post->private_id) }}">Приватная сслыка</a>
    </div>
    <form method="post" id="form">
        <input type="hidden" value="{{ $post->id }}" id="post_id">
        @include('includes.editor.componetns.button', ['title' => 'Опубликовать заметку'])
    </form>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('#form').on('submit', function(e){
                e.preventDefault();
                console.log($('#post_id').val())

                $.ajax({
                    type: 'POST',
                    url: '/blog/publish',
                    data: {
                        id: $('#post_id').val(),
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result){
                        console.log(result);
                    }
                });
            });
        });
    </script>
@endpush
