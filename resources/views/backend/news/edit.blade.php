@extends('backend.layouts.master')
@section('header')
    News
@stop
@section('subHeader')
    Edit  News
@stop
@section('content')
    <div class="row">
        {!! Form::model($news,['route'=> ['cms.news.update',$news->id], 'method'=>'PATCH'] ) !!}
           @include('backend.news.partials.form')
        {!! Form::close() !!}
    </div>
@endsection
