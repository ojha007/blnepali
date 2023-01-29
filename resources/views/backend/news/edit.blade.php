@extends($module.'::layouts.master')
@section('header')
    News
@stop
@section('subHeader')
    Edit  News
@stop
@section('breadcrumb')
    {{ Breadcrumbs::render('news.edit',$news,$routePrefix) }}
@stop

@section('content')
    @include('backend::partials.errors')
        <div class="row">
            {!! Form::model($news,['route'=> [$routePrefix.'news.update',$news->id],
                'method'=>'PATCH'] ) !!}
            @include($module.'::news.partials.form',['recommendations'=>$news->getRecommendationsIdAttribute() ?? old('recommendation_id')])
            {!! Form::close() !!}
        </div>
    <div class="row imagePreview">
        @foreach($images ?? [] as $id=>$image)
            <div class="col-lg-3 col-md-3 col-sm-4 ">
                <div class="thumbnail float-right text-center ">
                    <img src="{{$image}}" class="img-responsive center-block port-image">
                    {{Form::open(['route'=>[$routePrefix.'newsImage.deleteMedia',$id],
                        'class'=>'text-center','style'=>'margin:10px;','onsubmit' => "return confirm('Are you sure you want to delete?')"])}}
                    {{--                    <input type="hidden" name="image" value="{{$image}}">--}}
                    {{--                    <input type="hidden" name="id" value="{{$news->id}}">--}}
                    <button class="btn btn-sm  btn-danger deleteImage btn-flat"
                            type="submit" style="margin: 10px;">
                        <i class="fa fa-trash"></i>
                    </button>
                    {{Form::close()}}
                </div>
            </div>
        @endforeach
    </div>
@endsection
