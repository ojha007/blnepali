@extends('backend.layouts.master')
@section('header')
    News
@stop
@section('subHeader')
    List of News
@stop
@section('content')
    @include('backend.partials.errors')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default ">
                <div class="box-header with-border">
                    <h3 class="box-title">Customize Search</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa @if(request()->has('is_anchor')) fa-plus @else  fa-minus @endif"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! Form::open(array('route'=>['cms.news.index'],'method'=>'GET')) !!}

                    <div class="row">
                        @include('backend.partials.filter', ['filterBy'=>
                                    [
                                     'is_anchor'=>[ '1'=>'True','0'=>'False'],
                                     'is_special'=>['1'=>'True','0'=>'False'],
                                     'category'=>$selectCategories,
                                     'reporter'=>$selectReporters
                                     ]]
                               )
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-flat btn-primary">
                            <i class="fa fa-filter" aria-hidden="true"></i>&nbsp;Filter News
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box-header">
                <a class="btn btn-primary pull-right btn-flat"
                   href="{{route('cms.news.create')}}">
                    <i class="fa fa-plus"></i>
                    Add News
                </a>
            </div>
            <div class="box">
                <div class="box-header">
                    <div class="col-md-12">
                        <div class="col-md-3 pull-right pb-2">
                            {!! Form::open(['route'=>'cms.news.index','method'=>'GET'] ) !!}
                            <input class="form-control" type="text"
                                   name="q"
                                   value="{{request()->get('q')}}"
                                   placeholder="Search topics or keywords">
                            {{Form::close()}}
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive">

                    <table id="" class="table table-bordered table-condensed">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th class="w-25">News</th>
                            <th>Categories</th>
                            <th>Views</th>
                            <th>Author</th>
                            <th>Publish Date</th>
                            <th>Status</th>
                            <th class="no-sort">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allNews ?? [] as $news)
                            <tr>
                                <td class="col-md-1">
                                    {{$news->id}}
                                </td>
                                <td class="col-md-5">
                                    <a href="{{route('category.news.show',['category'=>$news->category->slug,'c_id'=>$news->c_id])}}"
                                       target="_blank">
                                        {{$news->title}}
                                    </a>
                                    <ul>
                                        @isset($news->guest)
                                            <li>
                                                Guest :
                                                <span class="label label-info">{{$news->guest}}</span>
                                            </li>
                                        @endisset

                                        @isset($news->reporter)
                                            <li>
                                                Reporter :
                                                <span class="label label-success">
                                                    {{$news->reporter->name}}
                                                </span>
                                            </li>
                                        @endisset

                                    </ul>
                                </td>
                                <td class="col-md-1">
                                    <ul>
                                        {{$news->category->name}}
                                    </ul>
                                </td>
                                <td>
                                    {{$news->view_count}}
                                </td>
                                <td>
                                    @isset($news->createdBy)
                                        Created By:<br>
                                        <span class="label label-warning">
                                            {{$news->createdBy->user_name}}
                                        </span>
                                    @endisset
                                    @isset($news->updatedBy)
                                        <br>
                                        Updated By:
                                        <br>
                                        <span class="label label-warning">
                                            {{$news->updatedBy->user_name}}
                                      </span>
                                    @endisset
                                    @isset($news->deletedBy)
                                        <br>
                                        DeletedBy By:
                                        <br>
                                        <span class="label label-danger">
                                            {{$news->deletedBy->user_name}}
                                        </span>
                                    @endisset

                                </td>
                                <td>
                                    {{$news->publish_date}}
                                </td>
                                <td>
                                    {!! spanByStatus($news->is_active,'1') !!}
                                </td>
                                <td>
                                    @if($trashed )
                                        <a href="{{route('cms.news.restore',$news->id)}}"
                                           class="btn btn-success btn-sm btn-flat" title="restore news">
                                            <i class="fa fa-window-restore"></i>
                                        </a>
                                    @else

                                        <a href="{{route('cms.news.edit',$news->id)}}"
                                           class="btn btn-primary btn-sm btn-flat">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['cms.news.destroy', $news->id],
                                                'onsubmit' => "return confirm('Are you sure you want to delete?')",   'style'=>"display:inline"
                                          ])
                                          !!}

                                        <button class="btn btn-danger btn-flat btn-sm" role="button"
                                                type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$allNews->links()}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@push('scripts')
@endpush
