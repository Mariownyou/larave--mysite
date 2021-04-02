
@if(count($errors) > 0)
    <div class="e2-nice-error e2-nice-error_hidden" role="alert">
        <div class="e2-nice-error-inner">
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
        </div>
    </div>
@endif
