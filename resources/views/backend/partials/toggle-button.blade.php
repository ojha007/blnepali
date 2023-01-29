<div class="form-group {{ $errors->has($value) ? 'has-error':'' }}">
    <label for="is_active">
        {!! Form::hidden($value, 0) !!}
        @if($checked == 1)
            <input name="{{$value}}" value="1" type="checkbox" data-toggle="toggle"
                   data-on="Yes"
                   data-off="No" checked>
        @else
            <input name="{{$value}}" value="1" type="checkbox" data-toggle="toggle"
                   data-on="Yes"
                   data-off="No">
        @endif
        @if(isset($title))
            {!!  $title !!}
        @else
            {{ucwords(str_replace('_',' ',$value))}}
        @endif

    </label>
</div>
