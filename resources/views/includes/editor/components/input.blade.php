@if(@$big)
    <div class="form-control form-control-big">
        <div class="form-label input-label"><label>{!! @$title !!}</label></div>
        <div class="form-element">
            <input type="text" class="text big required width-2" autofocus="autofocus" id="{{ @$name }}" name="{{ @$name }}" value="{{ @$value }}">
        </div>
    </div>
@else
    <div class="form-control">
        <div class="form-label input-label"><label>{!! @$title !!}</label></div>
        <div class="form-element">
            <input type="text" class="text required width-2" id="{{ @$name }}" name="{{ @$name }}" value="{{ @$value }}">
        </div>
    </div>
@endif
