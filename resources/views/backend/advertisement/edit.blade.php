@extends($module.'::layouts.master')
@section('header')
    News
@stop
@section('subHeader')
    Edit  News
@stop
@section('breadcrumb')
    {{ Breadcrumbs::render('advertisements.edit',$advertisement,$routePrefix) }}
@stop
@section('content')
    @include('backend::partials.errors')
    <div class="row">
        <div class="col-md-12">
            {!! Form::model($advertisement,['route'=> [$routePrefix.'advertisements.update',$advertisement->id],
           'method'=>'PATCH','file'=>true,'enctype' => 'multipart/form-data'] ) !!}
            @include($module.'::advertisement.partials.form')
            {!! Form::close() !!}
        </div>


    </div>
@endsection
