<div class="box no-header" style="border-top: none">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#general" data-toggle="tab" aria-expanded="true">General </a></li>
            <li class=""><a href="#position" data-toggle="tab" aria-expanded="true">Display Order</a></li>
            <li class=""><a href="#meta" data-toggle="tab" aria-expanded="false">Meta</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="general">
                <div class="box-body">
                    <div class="form-group col-md-6 {{$errors->has('title')?'has-error':''}}">
                        {{ Form::label('name', 'Category Name:', ['class'=>'control-label required'])}}
                        {!! Form::text('name', null, array('placeholder' => 'Enter Category Name','class' => 'form-control')) !!}

                    </div>
                    <div class="form-group col-md-6 {{$errors->has('slug')?'has-error':''}}">
                        {{ Form::label('slug', 'Category Slug:', ['class'=>'control-label required'])}}
                        {!! Form::text('slug', null, array('placeholder' => 'Enter Slug','class' => 'form-control')) !!}

                    </div>
                    <div class="form-group col-md-6 {{$errors->has('parent_id')?'has-error':''}}">
                        {{ Form::label('parent_id', 'Parent Category:', ['class'=>'control-label required'])}}
                        {!! Form::select('parent_id',$categories,
                                null, array('placeholder' => 'Select Parent Category','class' => 'form-control select2')) !!}

                    </div>
                    <div class="form-group col-md-6">
                        <div class="col-md-6">
                            {{ Form::label('slug', 'Category Status:', ['class'=>'control-label'])}}
                            @include('backend.partials.toggle-button',['value'=>'is_active','checked'=>$category->is_active])
                        </div>

                        <div class="col-md-6">
                            {{ Form::label('slug', 'Video:', ['class'=>'control-label'])}}
                            @include('backend.partials.toggle-button',['value'=>'is_video','checked'=>$category->is_video])
                        </div>

                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{route('cms.categories.index')}}" type="button"
                       class="btn btn-default btn-flat pull-left">
                        <i class="fa fa-arrow-left"></i>
                        Close
                    </a>
                    <button type="submit" class="btn btn-flat btn-primary pull-right">
                        <i class="fa fa-save"></i>
                        Submit
                    </button>
                </div>

            </div>

        </div>
    </div>


