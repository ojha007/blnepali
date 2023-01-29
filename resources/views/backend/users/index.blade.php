@extends($module.'::layouts.master')

@section('header')
    Users
@stop
@section('subHeader')
    List of  users
@stop

@section('breadcrumb')
    {{ Breadcrumbs::render('users.index',$routePrefix) }}
@stop
@section('content')
    @include('backend::partials.errors')
    <div class="row">
        <div class="col-xs-12">
            <div class="box-header">
                <a class="btn btn-primary pull-right btn-flat"
                   href="{{route($routePrefix.'users.create')}}">
                    <i class="fa fa-plus"></i>
                    Add User
                </a>
            </div>
            <div class="box">
                <div class="box-body table-responsive">
                    <table id="dataTable" class="table table-bordered dataTable table-condensed">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th class="no-sort">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)

                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->user_name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if(count($user->roles))
                                        <span class="label label-primary">
                                        {{$user->getRoleNames()->first()}}
                                    </span>
                                    @endif
                                </td>
                                <td>{{$user->image}}</td>
                                <td>{!! spanByStatus($user->status) !!}</td>
                                <td>

                                    <a href="{{route($routePrefix.'users.edit',$user->id)}}"
                                       class="btn btn-primary btn-sm btn-flat">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    {!! Form::open(['method' => 'DELETE', 'route' =>
                                            [$routePrefix.'users.destroy',$user->id],
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
                    {{$users->links()}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@push('scripts')
@endpush
