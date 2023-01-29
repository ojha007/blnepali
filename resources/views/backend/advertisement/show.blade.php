@extends($module.'::layouts.master')
@section('header')
    Advertisement
@stop
@section('subHeader')
    Advertisement
@stop
@section('breadcrumb')
        {{ Breadcrumbs::render('news.show',$advertisement,$routePrefix) }}
@stop
@section('content')
    @include('backend::partials.errors')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <table id="dataTable" class="table table-bordered table-condensed">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Title</th>
                            <th>For</th>
                            <th>Placement</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th class="no-sort">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$advertisement->id}}</td>
                            <td>{{$advertisement->title}}</td>
                            <td>{{$advertisement->for}}</td>
                            <td>{{$advertisement->placement}}</td>
                            <td>{!! $advertisement->description !!}</td>
                            <td>{!! spanByStatus($advertisement->is_active) !!}</td>
                            <td>
                                <a href="{{route($routePrefix.'advertisements.edit',$advertisement->id)}}"
                                   class="btn btn-primary btn-flat">
                                    <i class="fa fa-edit"></i>
                                </a>
                                {!! Form::open(['method' => 'DELETE', 'route' => [$routePrefix.'advertisements.destroy', $advertisement->id],
                                          'onsubmit' => "return confirm('Are you sure you want to delete?')",   'style'=>"display:inline"
                              ]) !!}
                                <button class="btn btn-danger btn-flat btn-sm" role="button" type="submit">
                                    <i class="fa fa-trash"></i>
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
@push('scripts')
@endpush
