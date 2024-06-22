@extends('backend.layouts.master')
@section('header')
    News Category
@stop
@section('subHeader')
    Edit  News Category
@stop

@section('content')
    @include('backend::partials.errors')
    <div class="row">
        <div class="col-md-12">
            
            {!! Form::model($category,array('route' => ['cms.categories.update',$category->id],'method'=>'PATCH')) !!}
            @include('backend.categories.partials.form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
