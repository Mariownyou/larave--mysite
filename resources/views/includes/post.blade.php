<div class="e2-note  e2-note-favourite" data-note-id="12" data-note-read-href="https://demo.blogengine.ru/all/handset-metaphor/read/">
    @include('includes.admin.admin_post_actions', ['post' => $post])
    <article>
        @if(!$post->published)
            <div class="e2-nonpublic-label">Не опубликовано</div>
        @endif
        <h1 class="e2-smart-title">
            {{ $post->title }}
        </h1>
        <div class="e2-note-text e2-text">
            {!! \App\Http\Controllers\BlogController::parseText($post->content) !!}
        </div>
    </article>
    <div class="e2-note-meta">
        {{--TODO Перводить на русский--}}
        @guest()
        @else
        <span class="admin-links">
            <a href="{{ route('blog.preview', $post->private_id) }}">Секретная ссылка</a>
        </span>&nbsp;&nbsp;
        @endguest
        <span title="{{ $post->created_at->format('Y.m.d H:i:s') }}">{{ $post->created_at->diffForHumans() }}</span> &nbsp;
        @foreach($post->tags as $tag)
            <a href="{{ route('blog.tags.show', $tag) }}" class="e2-tag ">{{ $tag->name }}</a> &nbsp;
        @endforeach
    </div>
</div>
