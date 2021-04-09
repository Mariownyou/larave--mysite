<div class="e2-note  e2-note-favourite" data-note-id="12" data-note-read-href="https://demo.blogengine.ru/all/handset-metaphor/read/">
    @include('includes.admin.admin_post_actions', ['post' => $post])
    <article>

        <h1 class="e2-smart-title">
            {{ $post->title }}
        </h1>
        <div class="e2-note-text e2-text">
            {!! $post->content !!}
        </div>
        <div class="e2-note-meta">
            @foreach($post->tags as $tag)
                <a href="{{ route('blog.tags.show', $tag->slug) }}" class="e2-tag">{{ $tag->name }}</a>
            @endforeach
        </div>
    </article>
    <div class="e2-note-meta">
        {{--TODO Перводить на русский--}}
        <span title="{{ $post->created_at->format('Y.m.d H:i:s') }}">{{ $post->created_at->diffForHumans() }}</span> &nbsp;
        @foreach($post->tags as $tag)
            <a href="{{ route('blog.tags.show', $tag) }}" class="e2-tag ">{{ $tag->name }}</a> &nbsp;
        @endforeach
    </div>
</div>
