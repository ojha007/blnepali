<div class="box-body">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('meta_title','Meta Title') !!}
            {{Form::text('meta[meta_title]', $meta->meta_title ?? '',['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {!! Form::label('meta_keywords','Meta Keywords') !!}
            {{Form::text('meta[meta_keywords]',$meta->meta_keywords ?? '',['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {!! Form::label('meta_description','Meta Description') !!}
            {{Form::textarea('meta[meta_description]',$meta->meta_description ?? '',['class'=>'form-control','rows'=>'5'])}}
        </div>
    </div>
</div>


