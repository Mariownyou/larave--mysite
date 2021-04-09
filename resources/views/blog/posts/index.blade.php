@extends('layouts.blog')

@section('page-title')
    Блог
@endsection

@section('content')
    @foreach($posts as $post)
        @include('includes.post', ['post' => $post])
    @endforeach
@endsection

@push('scripts')
    <script defer>
        $("img").each(function(index, element) {
            console.log(element)
            $(element).wrap(`<div class="e2-text-proportional-wrapper" style="padding-bottom: 66.67%"></div>`);
        });
    </script>
@endpush
