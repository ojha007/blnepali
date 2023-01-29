@extends($module.'::layouts.master')
@section('header')
    News
@stop
@section('subHeader')
    List of News
@stop
@section('breadcrumb')
    {{ Breadcrumbs::render('comments.index',$routePrefix) }}
@stop
@section('content')
    @include('backend::partials.errors')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    {!! Form::open(array('route'=>[$routePrefix.'comments.index'],'method'=>'GET')) !!}

                    <div class="row">
                        @include('backend::partials.filter',['filterBy'=>[
                                  'is_active'=>[
                                      '1'=>'True',
                                      '0'=>'False',
                                         ],

                                 ]])
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-flat btn-primary">
                            <i class="fa fa-filter" aria-hidden="true"></i>&nbsp;Filter News
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="box">
                <div class="box-body table-responsive">

                    <table id="" class="table table-bordered table-condensed">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th class="w-25">Full Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th>News Title</th>
                            <th>FB</th>
                            <th>Status</th>
                            <th class="no-sort">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{$comment->id}}</td>
                                <td>{{$comment->full_name}}</td>
                                <td>{{$comment->email}}</td>
                                <td>{{$comment->description}}</td>
                                <td>{{$comment->title}}</td>
                                <td></td>
                                <td>{!! spanByStatus($comment->is_active) !!}</td>
                                <td>
                                    <form action="{{route($routePrefix.'comments.changeStatus',$comment->id)}}"
                                          method="post">
                                        @csrf
                                        <button type="submit"
                                                class="btn btn-{{!$comment->is_active ? 'success' :'danger'}} btn-flat"
                                                title="{{!$comment->is_active ? 'Approve' :'InActive'}}">
                                            <i class="fa fa-{{ !$comment->is_active ? 'check' :'times'}}"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$comments->links()}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

