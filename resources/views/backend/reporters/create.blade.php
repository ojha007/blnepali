@extends('backend.layouts.master')
@section('header')
    Reporter
@stop
@section('subHeader')
    Create  Reporter
@stop

@section('content')
    <div class="row">
        {!! Form::open(['route'=> 'cms.reporters.store', 'method'=>'POST'] ) !!}

          @include('backend.reporters.partials.form')

        {!! Form::close() !!}

    </div>
@endsection
