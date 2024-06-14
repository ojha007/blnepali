<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">
            Create Advertisement
        </h3>
    </div>
    <div class="box-body">
        <div class="form-group col-md-6 {{$errors->has('title')?'has-error':''}}">
            {{ Form::label('title', 'Ads Title:', ['class'=>'control-label required'])}}
            {!! Form::text('title', null, array('placeholder' => 'Enter Title','class' => 'form-control')) !!}

        </div>
        <div class="form-group col-md-6 {{$errors->has('slug')?'has-error':''}}">
            {{ Form::label('url', 'Ads Url:', ['class'=>'control-label required'])}}
            {!! Form::text('url', null, array('placeholder' => 'Enter Ads Url','class' => 'form-control')) !!}

        </div>
        <div class="form-group col-md-6 {{$errors->has('for')?'has-error':''}}">
            {{ Form::label('for', 'Ads For:', ['class'=>'control-label required'])}}
            {!! Form::select('for',$selectAdsFor, null, array('placeholder' => 'Select ads for','class' => 'form-control select2')) !!}

        </div>
        <div class="form-group col-md-6 {{$errors->has('placement')?'has-error':''}}">
            {{ Form::label('placement', 'Placement:', ['class'=>'control-label required'])}}
            {!! Form::select('placement', $placement, null, array('placeholder' => 'Select Placement','class' => 'form-control select2')) !!}

        </div>
        <div class="form-group col-md-6 {{$errors->has('for')?'has-error':''}}">
            {{ Form::label('sub_for', 'Ads Sub For:', ['class'=>'control-label required'])}}
            {!! Form::select('sub_for',$selectAdsSubFor, null, array('placeholder' => 'Select sub for ','class' => 'form-control select2')) !!}

        </div>

        <div class="form-group col-md-6" style="margin-top: 12px; height: 36px;">
            @php($checked =$advertisement->is_active == 1 || old('is_active') == 1 || is_null($advertisement->is_active) )
            @include('backend.partials.toggle-button',['value'=>'is_active','checked'=>$checked])
        </div>

        <div class="form-group col-md-12">
            <label for="fieldID4">Banner Picture</label>
            <div class="input-group">
                     <span class="input-group-btn">
                         <a data-inputid="feature_image" data-preview="holder" class="btn btn-primary popup_selector">
                           <i class="fa fa-picture-o"></i> Choose
                         </a>
                       </span>
                {{Form::text('image',null,['id'=>'feature_image','class'=>'form-control'])}}

            </div>
            <div class="img-thumbnail" style="margin-top: 5px">
                <a href="{{isset($news) ? $news->image : '#'}}" target="_blank" id="holder_href">
                    <img id="holder" style="height:auto;width: 100%;" alt=""
                         src="{{isset($news) ? $news->image : ''}}">
                </a>
            </div>
        </div>
        <div class="form-group col-md-12 {{$errors->has('sub_description') ? 'has-error':''}}">
            {{ Form::label('sub_description', 'Sub Description:', ['class'=>' control-label '])}}
            {!! Form::textarea('sub_description', null, array('placeholder' => 'Enter sub description',
                    'class' => 'form-control','rows'=>'3')) !!}

        </div>
    </div>
    <div class="box-footer">
        <a href="{{route('cms.advertisements.index')}}" type="button"
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


@push('styles')
    <link href="{{asset('css/colorbox.css')}}" rel="stylesheet">
@endpush
@push('scripts')
    <script type="text/javascript" src="{{asset('js/jquery.colorbox-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('packages/barryvdh/elfinder/js/standalonepopup.js')}}"></script>
@endpush


