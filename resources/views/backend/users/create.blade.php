@extends($module.'::layouts.master')
@section('header')
    Users
@stop
@section('subHeader')
    Create  users
@stop
@section('breadcrumb')
    {{ Breadcrumbs::render('users.create',$routePrefix) }}
@stop
@section('content')
    @include('backend::partials.errors')
    <div class="row">
        {!! Form::open(['route'=> $routePrefix.'users.store',
            'method'=>'POST','class'=>'form-horizontal','file'=>true] ) !!}
                @include($module.'::users.partials.form')
        {!! Form::close() !!}

    </div>
@endsection
