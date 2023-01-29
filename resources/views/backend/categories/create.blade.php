@extends('backend.layouts.master')
@section('header')
    News Category
@stop
@section('subHeader')
    Create  News category
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(array('route' => 'cms.categories.store','method'=>'POST','class'=>' tab_form')) !!}
              @include('backend.categories.partials.form')
            {{Form::close()}}
        </div>
    </div>
@endsection


