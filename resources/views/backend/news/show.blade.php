@extends($module.'::layouts.master')
@section('header')
    News
@stop
@section('subHeader')
    News
@stop
@section('breadcrumb')
    {{--    {{ Breadcrumbs::render('news.show',$routePrefix) }}--}}
@stop
@section('content')
    @include('backend::partials.errors')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                {{--                @include('common::backend.components.dataTableFilter.FilterByStatus',[--}}
                {{--                  'selectFiscalYears'=>$selectFiscalYears,--}}
                {{--                  'fiscal_year_id'=>$fiscal_year_id,--}}
                {{--                   'status'=>$billStatus--}}
                {{--                       ])--}}
                <div class="box-body table-responsive">
                    <table id="dataTable" class="table table-bordered table-condensed">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th> News Title</th>
                            <th class="w-24">Description</th>
                            <th>Publish Date</th>
                            <th class="no-sort">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                {{$news->id}}
                            </td>
                            <td>
                                {{--                                    <a href="{{route($edition.'.news.show',$news->slug)}}">--}}
                                {{$news->title}}
                            </td>
                            <td>
                                {!!$news->description  !!}
                            </td>
                            <td>
                                {{$news->publish_date}}
                            </td>
                            <td>
                                <a href="{{route($routePrefix.'news.edit',$news->id)}}"
                                   class="btn btn-primary btn-flat">
                                    <i class="fa fa-edit"></i>
                                </a>

                                {!! Form::open(['method' => 'DELETE', 'route' => [$routePrefix.'news.destroy', $news->id],
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
