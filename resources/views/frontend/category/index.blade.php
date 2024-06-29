@extends('frontend.layouts.master')
@section('title')
    @if(!$news->isEmpty())
        {{$news->first()->category->name}}
    @else
        Breaknlinks
    @endif
@endsection
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
                <div class="news-row">
                    <div class="col-md-12 text-left my-2 py-2">
                        <h1 class="small-title">
                            @if(!$news->isEmpty())
                            <div class="bl-newsHeader">
                                <h5 class="header-title">{{$news->first()->category->name}}</h5>
                            </div>
                        @endif
                        </h1>
                        <hr style="margin-top:-8px">
                    </div>
                   
                    <div class="bl-news bl-news--condensed">
                        @foreach($news as $key=>$item)
                                <div class="col-md-12 mb-5">
                                    <div class="shadow-sm">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="shadow-sm  text-center">
                                                    <a class="my-5" href="{{route('category.news.show',['category'=>$item->category->slug,'c_id'=>$item->c_id])}}">
                                                        <img width="840" height="540"
                                                            src="{{$item->image}}"
                                                            class="attachment-full size-full wp-post-image" alt="" decoding="async"
                                                            fetchpriority="high"
                                                            srcset="{{$item->image}} 840w, {{$item->image}} 768w"
                                                            sizes="(max-width: 840px) 100vw, 840px">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <a class="my-5" href="{{route('category.news.show',['category'=>$item->category->slug,'c_id'=>$item->c_id])}}">
                                                    <div class="media-body p-3">
                                                        <h2 class="mt-0 p-2 small-title"> {!! $item->title !!}
                                                        </h2>
                                                        <p class="">
                                                            {!! $item->short_description !!}
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                    <div class="flex justify-content-center mt-5">
                        {{$news->links('vendor.pagination.custom')}}
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 pt-4">
                <div class="aside-news-rows sticky-xl-top">
                <div class="col-md-12 my-4">
                    <h5 class="header-title">ट्रेन्डिङ</h5>
                </div>
                @foreach($trendingNews as $news)
                <div class="d-flex align-items-center border-bottom mb-3">
                    <figure class="post_img">
                        <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}">
                            <img style="width: 80px; height: 80px;" src="{{ $news->image }}" alt="{{ $news->image_alt }}">
                        </a>
                    </figure>
                    <div class="ps-3">
                        <h5 class="fw-bold medium-title fs-5">
                            <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}">{{ $news->title }}</a>
                        </h5>
                        {{-- <p class="text-muted fw-bold">
                        {{print_r($news)}}
                        </p> --}}
                    </div>
                </div>
            @endforeach
            </div>
            </div>
        </div>
    </section>
@endsection
