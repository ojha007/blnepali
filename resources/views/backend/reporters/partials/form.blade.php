<div class="col-md-12">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">
                <strong>
                    Reporters
                </strong>
            </h3>
        </div>
        <div class="box-body">
            <div class="form-group col-md-6 {{$errors->has('name') ?'has-error':''}}">
                <label class="required" for="name">
                    <i class="fa fa-tex"></i>
                    Reporter Name
                </label>
                {{Form::text('name',null,
                    [
                        'class'=>'col-md-6 form-control required valid',
                        'autocomplete'=>'off',
                        'placeholder'=>'Enter  Reporter Name',
                    ])}}
            </div>

            <div class="col-md-6 form-group {{$errors->has('slug') ?'has-error':''}}">
                {{Form::label('slug','Slug in English')}}
                {{Form::text('slug',null,
                            [
                            'class'=>'col-md-6 form-control ',
                            'autocomplete'=>'off',
                            'placeholder'=>'Enter Slug in English',
                            ])}}
            </div>
            <div class="col-md-6 form-group {{$errors->has('designation') ?'has-error':''}}">
                {{Form::label('designation','Designation:')}}
                {{Form::text('designation',null,
                            [
                            'class'=>'col-md-6 form-control ',
                            'autocomplete'=>'off',
                            'placeholder'=>'Enter Designation',
                            ])}}
            </div>

            <div class="col-md-6 form-group {{$errors->has('address') ?'has-error':''}}">
                {{Form::label('address','Address:')}}
                {{Form::text('address',null,
                            [
                            'class'=>'col-md-6 form-control ',
                            'autocomplete'=>'off',
                            'placeholder'=>'Enter Address',
                            ])}}
            </div>

            <div class="col-md-6 form-group {{$errors->has('organization') ?'has-error':''}}">
                {{Form::label('organization','Organization:')}}
                {{Form::text('organization',null,
                            [
                            'class'=>'col-md-6 form-control ',
                            'autocomplete'=>'off',
                            'placeholder'=>'Enter Organization',
                            ])}}
            </div>

            <div class="form-group col-md-6 {{$errors->has('facebook_url' ?'has-error':'')}}">
                <label>
                    <b>Facebook</b>
                </label>
                {{Form::text('facebook_url',null,
                    ['class'=>'select2 form-control','placeholder'=>'Enter Facebook Url',
                    'style'=>'width:100%'])}}
            </div>

            <div class="col-md-6 form-group {{$errors->has('twitter') ?'has-error':''}}">
                {{Form::label('twitter','Twitter:')}}
                {{Form::text('twitter_url',null,
                            [
                            'class'=>'col-md-6 form-control ',
                            'autocomplete'=>'off',
                            'title'=>'Title',
                            'placeholder'=>'Enter Twitter Url',
                            ])}}
            </div>

            <div class="col-md-6 form-group {{$errors->has('phone_number') ?'has-error':''}}">
                {{Form::label('phone_number','Phone Number:')}}
                {{Form::tel('phone_number',null,
                            [
                            'class'=>'col-md-6 form-control ',
                            'autocomplete'=>'off',
                            'title'=>'Title',
                            'placeholder'=>'Enter Phone Number',
                            ])}}
            </div>
            <div class="col-md-6 form-group {{$errors->has('email') ?'has-error':''}}">
                {{Form::label('email','Email:')}}
                {{Form::email('email',null,
                            [
                            'class'=>'col-md-6 form-control ',
                            'autocomplete'=>'off',
                            'title'=>'Title',
                            'placeholder'=>'Enter Email Address',
                            ])}}
            </div>

            <div class="col-md-6 form-group {{$errors->has('caption') ?'has-error':''}}">
                {{Form::label('caption','Caption:')}}
                {{Form::text('caption',null,
                            [
                            'class'=>'col-md-6 form-control ',
                            'autocomplete'=>'off',
                            'title'=>'caption',
                            'placeholder'=>'Enter Caption ',
                            ])}}
            </div>

            <div class="form-group col-md-6">
                <label for="fieldID4">Banner Picture</label>
                <div class="input-group">
                   <span class="input-group-btn btn-flat">
                     <button
                         type="button"
                         onclick="return openElFinder(event, 'feature_image');"
                         data-inputid="feature_image"
                         class="btn btn-primary  ">
                       <i class="fa fa-picture-o"></i> Choose
                     </button>
                   </span>
                    {{Form::text('image',null,['id'=>'feature_image','class'=>'form-control'])}}
                </div>
            </div>

        </div>
        <div class="box-footer">
            <a href="{{route('cms.reporters.index')}}" type="button"
               class="btn btn-flat pull-left btn-default">
                <i class="fa fa-arrow-left">
                </i>
                Close
            </a>
            <button type="submit" class="btn btn-flat btn-primary pull-right">
                <i class="fa fa-save">
                </i>
                Submit
            </button>
        </div>
    </div>
</div>






@push('scripts')
    <script>

    </script>
@endpush
