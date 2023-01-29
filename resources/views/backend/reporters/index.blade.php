@extends('backend.layouts.master')
@section('header')
    Reporters
@stop
@section('subHeader')
    List of  Reporters
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box-header">
                <a class="btn btn-primary pull-right btn-flat"
                   href="{{route('cms.reporters.create')}}">
                    <i class="fa fa-plus"></i>
                    Add Reporters
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <div class="col-md-12">
                        <div class="col-md-3 pull-right pb-2">
                            {!! Form::open(['route'=> 'cms.reporters.index','method'=>'GET'] ) !!}
                            <input class="form-control" type="text"
                                   name="q"
                                   value="{{request()->get('q')}}"
                                   placeholder="Search topics or keywords">
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered   table-condensed">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Phone Number</th>
                            <th>Total News</th>
                            <th class="no-sort">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reporters as $reporter)
                            <tr>
                                <td>{{$reporter->id}}</td>
                                <td>{{$reporter->name}}</td>
                                <td>
                                    <img width="150px;" height="100px;" src="{{$reporter->image}}"
                                         alt="{{$reporter->slug}}">
                                </td>
                                <td>{{$reporter->phone_number}}</td>
                                <td>
                                    <a href="{{route('cms.news.index',['reporter'=>$reporter->id])}}"
                                       target="_blank">
                                        {{$reporter->news_count}}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('cms.reporters.edit',$reporter->id)}}"
                                       class="btn btn-primary btn-sm btn-flat">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['cms.reporters.destroy',$reporter->id],
                                             'onsubmit' => "return confirm('Are you sure you want to delete?')",   'style'=>"display:inline"
                                       ])!!}
                                    <button class="btn btn-danger btn-flat btn-sm" role="button" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$reporters->links()}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
