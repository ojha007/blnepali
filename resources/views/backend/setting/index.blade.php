@extends($module.'::layouts.master')
@section('header')
    Settings
@stop
@section('subHeader')
    @php($setting = ucwords(str_replace('-',' ' ,request()->route('setting'))))
    {{$setting}}
@stop
@section('breadcrumb')
    {{ Breadcrumbs::render('settings.index',$setting,$routePrefix) }}
@stop

@section('content')
    @include($module.'::partials.errors')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                {!! Form::open(array('route' => $routePrefix.'settings.store','method'=>'POST','class'=>'form-horizontal',
                        'enctype'=>'multipart/form-data', 'id'=>'setting_form')) !!}
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        @foreach($site_settings as $key=>$tab)
                            <li class="{{$loop->index == 0 ? 'active' :''}}">
                                <a href="#{{$key}}" data-type="{{$key}}" data-toggle="tab"
                                   aria-expanded="false">
                                    {{ucwords(str_replace('_',' ' ,$key))}}
                                </a></li>
                        @endforeach
                    </ul>
                    <div class="box-header ">
                        <div class="tab-content">
                            @foreach($site_settings as $key=>$tabs)
                                <div class="tab-pane {{$loop->index == 0 ? 'active' :''}}" id="{{$key}}">
                                    <div class="box-body">
                                        @foreach($tabs as $tab=>$type)
                                            @php($text = ucwords(str_replace('_',' ' ,$tab)))
                                            @php($class = $type =='textarea' ? 'col-md-12':'col-md-6')
                                            @php($subClass1 = $type == 'textarea' ? 'col-md-2':'col-md-4')
                                            @php($subClass2 = $type == 'textarea' ? 'col-md-10':'col-md-8')
                                            @php($rows = $type == 'textarea' ? '3':'')
                                            <div
                                                class="form-group {{$class}} {{ $errors->has($tab) ? 'has-error':'' }}">
                                                {{ Form::label($tab, $text.':', ['class'=>"control-label $subClass1"])}}
                                                <div class="{{$subClass2}}">
                                                    {{ Form::{$type}($tab, setting($tab),
                                                    ['class'=>'form-control', 'placeholder'=>$text,'rows'=>$rows]) }}
                                                    {!! $errors->first($tab, '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{{route($routePrefix.'settings.index',request()->route()->parameters)}}" type="button"
                           class="btn btn-default btn-flat pull-left">
                            <i class="fa fa-arrow-left"></i>
                            Close
                        </a>
                        <button type="submit" class="btn btn-flat btn-primary pull-right">
                            <i class="fa fa-save"></i>
                            Submit
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop
@push('scripts')

@endpush
