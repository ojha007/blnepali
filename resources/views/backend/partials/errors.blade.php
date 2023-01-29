@if ($message = Session::get('success'))
    <div class="box-body" style="padding-left: 0; padding-right: 0;">
        <div class="alert alert-success alert-dismissible no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            {!! $message !!}
        </div>
    </div>
@endif


@if ($message = Session::get('failed'))
    <div class="box-body" style="padding-left: 0; padding-right: 0;">
        <div class="alert alert-danger alert-dismissible no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-exclamation"></i> Error!</h4>
            {!! $message !!}
        </div>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="box-body" style="padding-left: 0; padding-right: 0;">
        <div class="alert alert-danger alert-dismissible no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-exclamation"></i> Error!</h4>
            {!! $message !!}
        </div>
    </div>
@endif

@if ($message = Session::get('unauthorized'))
    <div class="box-body" style="padding-left: 0; padding-right: 0;">
        <div class="alert alert-danger alert-dismissible no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Unauthorized Access!</h4>
            {!! $message !!}
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="box-body" style="padding-left: 0; padding-right: 0;">
        <div class="alert alert-danger alert-dismissible no-margin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Error!</h4>
            @foreach (array_unique($errors->all()) as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
    </div>
@endif



