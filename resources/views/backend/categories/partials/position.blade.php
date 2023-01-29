<div class="box-body">
    <p class="pt-2">
        Enter the number to show the category in corresponding positions!
    </p>
    <div class="form-group col-md-6 {{$errors->has('title')?'has-error':''}}">
        {{ Form::label('front_header_position', 'Front Page Header Position:', ['class'=>'control-label '])}}
        {!! Form::number("position[front_header_position]", null, array('placeholder' => 'Front Header Position','class' => 'form-control')) !!}

    </div>
    <div class="form-group col-md-6 {{$errors->has('title')?'has-error':''}}">
        {{ Form::label('front_body_position', 'Front Page Body Position:', ['class'=>'control-label '])}}
        {!! Form::number("position[front_body_position]", null, array('placeholder' => 'Front Body Position','class' => 'form-control')) !!}

    </div>
    <div class="form-group col-md-6 {{$errors->has('title')?'has-error':''}}">
        {{ Form::label('detail_header_position', 'Detail Page Header Position:', ['class'=>'control-label '])}}
        {!! Form::number("position[detail_header_position]", null, array('placeholder' => 'Detail Header Position','class' => 'form-control')) !!}

    </div>
    <div class="form-group col-md-6 {{$errors->has('title')?'has-error':''}}">
        {{ Form::label('detail_body_position', 'Detail Page Body Position:', ['class'=>'control-label '])}}
        {!! Form::number("position[detail_body_position]", null, array('placeholder' => 'Detail Body Position','class' => 'form-control')) !!}

    </div>
</div>
