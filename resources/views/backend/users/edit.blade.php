@extends($module.'::layouts.master')
@section('header')
    Users
@stop
@section('subHeader')
    Edit  user
@stop
@section('breadcrumb')
    {{ Breadcrumbs::render('users.edit',$user,$routePrefix) }}
@stop
{{--@dd($user)--}}
@section('content')
    @include('backend::partials.errors')
    <div class="row">
        {!! Form::model($user,['route'=> [$routePrefix.'users.update',$user->id],
            'method'=>'PATCH','class'=>'form-horizontal','file'=>true] ) !!}
        @include($module.'::users.partials.form')
        {!! Form::close() !!}

    </div>
@endsection
