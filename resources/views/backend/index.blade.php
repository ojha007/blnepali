@extends('backend.layouts.master')
@section('header')
    Dashboard
@stop
@section('subHeader')
    Dashboard
@stop
@section('content')
    <div>
        <section class="content">
            <div class="row">
                @foreach($attributes as $key=>$value)
                    @include('backend.dashboard.components.info-box')
                @endforeach

            </div>
        </section>
    </div>
@endsection
