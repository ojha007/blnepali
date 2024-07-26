<div class="col-md-9">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">
                <strong>
                    Create News
                </strong>
            </h3>
        </div>
        <div class="box-body">
            <div class="form-group col-md-12 {{$errors->has('title') ?'has-error':''}}">
                <label class="required" for="title">
                    <i class="fa fa-tex"></i>
                    Title
                </label>
                {{Form::text('title',null,
                    [
                        'class'=>'col-md-6 form-control required valid',
                        'autocomplete'=>'off',
                        'title'=>'Title',
                        'placeholder'=>'Enter News Title',
                        "style"=>"height:65px;font-size:25px"

                    ])}}
            </div>
            <div class="col-md-12 form-group {{$errors->has('sub_title') ?'has-error':''}}">
                {{Form::label('sub_title','Sub Title:')}}
                {{Form::text('sub_title',null,
                            [
                                'class'=>'col-md-6 form-control',
                                'autocomplete'=>'off',
                                'title'=>'Title',
                                'placeholder'=>'Enter Secondary Title',
                                 "style"=>"height:40px;font-size:20px"
                            ])}}
            </div>
            <div class="col-md-12 form-group {{$errors->has('slug') ?'has-error':''}}">
                {{Form::label('slug','Enter Slug:')}}
                {{Form::text('slug',null,
                            [
                            'class'=>'col-md-6 form-control',
                            'autocomplete'=>'off',
                            'title'=>'slug',
                            'placeholder'=>'Enter Slug',
                            ])}}
            </div>

            <div class="form-group col-md-12 {{$errors->has('reporter_id') ? 'has-error':''}}">
                {{Form::label('reporter_id','ByLine:')}}
                {{Form::select('reporter_id',$reporters,null,['class'=>'form-control select2','placeholder'=>'Enter By Line','style=width:100%'])}}
            </div>

            <div class="form-group col-md-12 {{$errors->has('guest_id') ? 'has-error':''}}">
                {{Form::label('guest_id','Guest By Line:')}}
                {{Form::text('guest', null,['class'=>'form-control','placeholder'=>'Select By Line'])}}
            </div>

            <div class="form-group col-md-12 {{$errors->has('video_url') ?'has-error':''}}">
                <label for="title"> <i class="fa fa-youtube-play"></i> <b>Embed Code Only</b></label>
                {{Form::text('video_url',null,['class'=>'form-control','placeholder'=>'Enter video embed code only '])}}
            </div>

            <div class="form-group col-md-12 {{$errors->has('external_url'?'has-error':'')}}">
                <label for="external_url"> External URL </label>
                {{Form::text('external_url',null,['class'=>'form-control','placeholder'=>'Enter external link if any','autocomplete'=>'any'])}}
            </div>

            <div class="form-group col-md-12 @error('description') has-error @enderror">
                <label for="description"> <b>Full description </b></label>
                {{Form::textarea('description' ,null,['class'=>'form-control ck-description',
                'rows'=>'15','cols'=>'10','placeholder'=>'Enter description','id'=>'description'])}}

            </div>
        </div>
        <div class="box-footer">
            <a href="{{route('cms.news.index')}}" type="button" class="btn pull-left btn-flat btn-default">
                <i class="fa fa-arrow-left">
                </i>
                Close
            </a>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="box box-default">
        <div class="box-body">
            <div class="form-group  {{$errors->has('publish_date') ? 'has-error':''}}">
                {{ Form::label('publish_date', 'Publish on:', ['class'=>'control-label required'])}}
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    @if(old('publish_date'))
                        <input type="datetime-local" value="{{old('publish_date')}}"
                               class="form-control" name="publish_date">
                    @else
                        <input type="datetime-local" value="{{ isset($news) ?
                                         \Carbon\Carbon::parse($news->publish_date)->format('Y-m-d\TH:i')
                                        : now()->timezone(config('app.timezone'))->format('Y-m-d\TH:i')
                                        }}"

                               class="form-control" name="publish_date">
                    @endif

                </div>
            </div>
            <div class="form-group  {{$errors->has('date_line') ?'has-error':''}}">
                <label for="date_line required"><i class="fa fa-map-marker"></i> Date Line </label>
                {{Form::text('date_line',null,['class'=>'form-control','placeholder'=>'Enter dateline'])}}
            </div>
            <div class="form-group  {{$errors->has('category_id' ?'has-error':'')}}">
                <label>
                    <b>Categories</b>
                </label>

                {{Form::select('category_id',$categories, null,['class'=>'form-control select2','style'=>'width:100%'])}}
            </div>
            <div class="form-group">
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

            <div class="form-group  {{$errors->has('image_alt'?'has-error':'')}}">
                {{Form::label('image_alt','Image Title')}}
                {{Form::text('image_alt',null,['class'=>'form-control','placeholder'=>'Enter image Title'])}}

            </div>
            <div class="form-group  {{$errors->has('image_caption'?'has-error':'')}}" style="padding-right: 0">
                {{Form::label('image_description','Image Caption',['class'=>'required'])}}
                {{Form::textarea('image_description',null,['class'=>'form-control','placeholder'=>'Enter image caption','rows'=>'5'])}}

            </div>
            <div class="form-group  {{$errors->has('short_description') ?'has-error':''}}">
                <label for="short_description" class="required"> <b>Short description </b></label>
                {{Form::textarea('short_description' ,null,['class'=>'form-control','rows'=>'5','cols'=>'10','placeholder'=>'Enter sub description'])}}
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group {{$errors->has('is_anchor') ?'has-error':''}}">
                        @include('backend.partials.toggle-button',['value'=>'is_anchor','checked'=>$news->is_anchor ?? 0])

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group  {{$errors->has('is_special') ?'has-error':''}} ">
                        @include('backend.partials.toggle-button',['value'=>'is_special','checked'=> $news->is_special ?? 0])
                    </div>
                </div>
            </div>
            <div class="form-group  {{$errors->has('is_breaking') ?'has-error':''}} ">
                @include('backend.partials.toggle-button',['value'=>'is_breaking','title'=>'Breaking News','checked'=> $news->is_urgent ?? 0])
            </div>

            <div class="box">
                <div class="with-border">
                    <div class="box-header">
                        <h5 class="box-title">Banner Setting</h5>
                    </div>
                    <div class="box-body">
                        <div class="form-group  {{$errors->has('is_banner') ?'has-error':''}} ">
                            @include('backend.partials.toggle-button',['value'=>'is_banner','title'=>'Banner News','checked'=> $news->is_banner ?? 0])
                        </div>
                        <div class="form-group hide banner_setting @error('banner_position') 'has-error' @enderror">
                            {{Form::label('banner_position','Banner Position')}}
                            {{Form::text('banner_position',null,['class'=>'form-control','placeholder'=>'Enter banner position'])}}
                        </div>
                        <div class="form-group hide banner_setting @error('image_visible' ) 'has-error' @enderror">
                            {{Form::checkbox('image_visible','1',['class'=>'form-control'])}}
                            {{Form::label('image_visible','Show Image on banner')}}
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group  {{$errors->has('status') ? 'has-error':''}} ">
                {!! Form::select('status', ['active'=>'Active','draft'=>'Draft'], null,
                                        ['class' => 'form-control  select2', 'style'=>'width:100%;']) !!}

            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary  btn-block pull-right btn-flat" id="submitBtn">
                <i class="fa fa-save"></i> Submit
            </button>
        </div>
    </div>
</div>
@push('styles')
    <link href="{{asset('css/colorbox.css')}}" rel="stylesheet">
@endpush
@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>

    <script type="text/javascript" src="{{asset('js/jquery.colorbox-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('packages/barryvdh/elfinder/js/standalonepopup.js')}}"></script>
    <script>
        CKEDITOR.replace('description', {
            filebrowserImageBrowseUrl: '{{url('/elfinder/ckeditor?type=Images')}}',
            filebrowserImageUploadUrl: '{{url('/elfinder/ckeditor/upload?type=Images&_token=')}}',
            filebrowserBrowseUrl: '{{url('/elfinder/ckeditor?type=Files')}}',
            filebrowserUploadUrl: '{{url('/elfinder/ckeditor/upload?type=Files&_token=')}}'
        });
        $(document).ready(function () {
            $("input[name='is_banner']").on('change', function () {
                $('.banner_setting').toggleClass('hide');
            })
        })
    </script>
@endpush


