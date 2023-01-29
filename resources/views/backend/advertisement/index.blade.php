@extends('backend.layouts.master')
@section('header')
    Advertisements
@stop
@section('subHeader')
    List of Advertisements
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box-header">
                <a class="btn btn-primary pull-right btn-flat"
                   href="{{route('cms.advertisements.create')}}">
                    <i class="fa fa-plus"></i>
                    Add Advertisements
                </a>
            </div>
            <div class="box">
                <div class="box-body table-responsive">
                    <table id="dataTable" class="table table-bordered dataTable table-condensed">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th style="width: 30%">Title</th>
                            <th>For</th>
                            <th>Placement</th>
                            <th>sub For</th>
                            <th>Description</th>
                            <th>Created date</th>
                            <th>Status</th>
                            <th class="no-sort">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($advertisements as $ads)
                            <tr>
                                <td>#{{$ads->id}}</td>
                                <td>{{$ads->title}}</td>
                                <td>{{ucwords(str_replace('_',' ' ,$ads->for))}}</td>
                                <td>{{ucwords(str_replace('_',' ' ,$ads->placement))}}</td>
                                <td>{{ucwords(str_replace('_',' ' ,$ads->sub_for))}}</td>
                                <td>{!! $ads->description !!}</td>
                                <td>{{\Carbon\Carbon::parse( $ads->created_at)->format('Y-m-d')}}</td>
{{--                                <td>{!! spanByStatus($ads->is_active) !!}</td>--}}
                                <td>

                                    <a href="{{route('cms.advertisements.edit',$ads->id)}}"
                                       class="btn btn-primary btn-sm btn-flat">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['cms.advertisements.destroy', $ads->id],
                                           'onsubmit' => "return confirm('Are you sure you want to delete?')",   'style'=>"display:inline"
                                  ]) !!}
                                    <button class="btn btn-danger btn-flat btn-sm" role="button" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--                    {{$advertisements->links()}}--}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

