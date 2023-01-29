@extends('backend.layouts.master')
@section('header')
    Advertisements
@stop
@section('subHeader')
    Create  Advertisements
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::model($advertisement,['route'=> 'cms.advertisements.store', 'method'=>'POST'] ) !!}
            @include('backend.advertisement.partials.form')
            {!! Form::close() !!}
        </div>

    </div>
@endsection
