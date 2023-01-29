@extends('backend.layouts.master')
@section('header')
    News Categories
@stop
@section('subHeader')
    List of Categories
@stop
@section('content')
    <div class="row">
        <div class="col-xs-12">

            <div class="box-header">
                <a class="btn btn-primary pull-right btn-flat"
                   href="{{route('cms.categories.create')}}">
                    <i class="fa fa-plus"></i>
                    Add News Category
                </a>
            </div>

            <div class="box">
                <div class="box-body table-responsive">
                    <table id="dataTable" class="table table-bordered table-condensed tree-table">
                        <thead>
                        <tr>
                            <th>Category</th>
                            <th>DisplayOrder</th>
                            <th>status</th>
                            <th class="no-sort">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($padding = 1)
                        @foreach($categories as $category)
                            @include('backend.categories.partials.tr-element',['category'=>$category,'padding'=>$padding])
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
