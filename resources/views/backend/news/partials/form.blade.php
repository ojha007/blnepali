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
                        <input type="datetime-local" value="{{isset($news) ?
                                         \Illuminate\Support\Carbon::parse($news->publish_date)->format('Y-m-d\TH:i')
                                        : now()->timezone(config('app.timezone'))->format('Y-m-d\TH:i')}}"

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
                         <a id="lfm" data-input="feature_image" data-preview="holder" class="btn btn-primary">
                           <i class="fa fa-picture-o"></i> Choose
                         </a>
                       </span>
                    {{Form::text('image',null,['id'=>'feature_image','class'=>'form-control'])}}
                </div>
                <img id="holder" style="margin-top:15px;height:100px;width: 250px;" alt=""
                     src="{{isset($news) ? $news->image : ''}}">
            </div>

            <div class="form-group  {{$errors->has('image_alt'?'has-error':'')}}">
                {{Form::label('image_alt','Image Title')}}
                {{Form::text('image_alt',null,['class'=>'form-control','placeholder'=>'Enter image Title'])}}

            </div>
            <div class="form-group  {{$errors->has('image_caption'?'has-error':'')}}" style="padding-right: 0">
                {{Form::label('image_description','Image Caption',['class'=>'required'])}}
                {{Form::textarea('image_description',null,['class'=>'form-control','placeholder'=>'Enter image caption','rows'=>'5'])}}

            </div>
            <div class="form-group   {{$errors->has('short_description') ?'has-error':''}}">
                <label for="short_description" class="required"> <b>Short description </b></label>
                {{Form::textarea('short_description' ,null,['class'=>'form-control','rows'=>'5','cols'=>'10','placeholder'=>'Enter sub description'])}}
            </div>
            <div class="form-group  {{$errors->has('is_anchor') ?'has-error':''}}">
                @include('backend.partials.toggle-button',['value'=>'is_anchor','checked'=>$news->is_anchor ?? 0])

            </div>
            <div class="form-group  {{$errors->has('is_special') ?'has-error':''}} ">
                @include('backend.partials.toggle-button',['value'=>'is_special','checked'=> $news->is_special ?? 0])
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary  btn-block pull-right btn-flat" id="submitBtn">
                <i class="fa fa-save"></i> Submit
            </button>
        </div>
    </div>
</div>
@push('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/filemanager?type=Images',
            filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/filemanager?type=Files',
            filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('description', options);
    </script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
@endpush


