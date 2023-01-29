@extends('backend.layouts.master')
@section('header')
    News
@stop
@section('subHeader')
    Create  News
@stop

@section('content')
    <div class="row">
        {!! Form::open(['route'=> 'cms.news.store','method'=>'POST'] ) !!}

        @include('backend.news.partials.form')

        {!! Form::close() !!}
    </div>
@endsection
