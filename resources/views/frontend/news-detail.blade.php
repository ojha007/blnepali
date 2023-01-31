@extends('frontend.layouts.master')
@section('title')
    {{$news->title}}
@endsection
@section('meta')
    <meta property="og:type" content="article"/>
    <meta property="og:url"
          content="{{route('category.news.show',['category'=>$news->category->slug,'c_id'=>$news->c_id])}}"/>
    <meta property="og:title" content="{{$news->title}}"/>
    <meta content="{{$news->title}}"/>
    <meta content="Breaknlinks" property="og:site_name"/>
    <meta name="title" content="{{$news->title}}">
    <meta name="description" content="{{$news->short_description}}">
    <meta property="og:image" content="{{$news->image}}"/>
    <meta property="og:description" content="{{$news->short_description}}"/>
    <meta content="1200" property="og:image:width"/>
    <meta content="800" property="og:image:height"/>
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:url"
          content="{{route('category.news.show',['category'=>$news->category->slug,'c_id'=>$news->c_id])}}"/>
    <meta name="twitter:title" content="{{$news->title}}"/>
    <meta name="twitter:image:src" content="{{$news->image}}"/>
    <meta name="twitter:description" content="{{$news->short_description}}"/>
@endsection

@section('content')
    <section class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9">
                <div class="bl-newsPost--details">
                    <div class="bl-post--header">
                        <div class="bl-post--meta">
                            <div class="post-meta-item cat-labels">
                                <a href="#" class="meta-category">{{$news->category->name}}</a>
                            </div>
                            <div class="post-meta-item post-title">
                                <h1>{!! $news->title !!}</h1>
                            </div>
                            <div class="post-meta-item meta-reporter">
                                <div class="meta-author-info">
                                    <span class="has-author-img">
                                        @if($news->guest)
                                            <img src="{{ asset('frontend/images/blLogo.png') }}"
                                                 alt="{{$news->guest}}">
                                        @elseif($news->reporter)
                                            <img
                                                src="{{ $news->reporter->image ?? asset('frontend/images/blLogo.png') }}"
                                                alt="{{$news->reporter->name}}">
                                        @endif
                                    </span>
                                    <span class="post-by">
                                        <a href="#">
                                            @if($news->guest)
                                                {{$news->guest}}
                                            @elseif($news->reporter)
                                                {{$news->reporter->name}}
                                            @endif
                                        </a>
                                    </span>
                                </div>
                                <div class="post-date">
                                    {{\Carbon\Carbon::parse($news->publish_date)->format('Y m d H:i A')}}
                                </div>
                                <div class="w-auto ms-auto">
                                    <div class="sharethis-inline-share-buttons"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="bl-post--banner">
                        <figure class="primaryImage">
                            <img src="{{$news->image}}" alt="BlMedia"/>
                        </figure>

                        <div class="primaryImage-caption">
                            {{ $news->img_description ?? $news->img_alt }}
                        </div>
                    </div>
                    <div class="bl-newsPost--details-story">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 col-xxl-3 pe-4">
                                <div class="aside-right-seperator">
                                    <div class="aside-news-rows">
                                        <div class="bl-newsHeader header-center">
                                            <h5 class="header-title">Related News</h5>
                                        </div>
                                        <div class="bl-news bl-news--verticalThumbs">
                                            @foreach($sameCategoryNews as $key=>$ne)
                                                <div class="bl-newsPost bl-newsPost--thumbnail">
                                                    <figure class="post_img">
                                                        <a href="{{route('category.news.show',[$ne->category->slug,$ne->c_id])}}">
                                                            <img src="{{$ne->image}}" alt=""/>
                                                        </a>
                                                    </figure>
                                                    <div class="post_content">
                                                        <h5 class="post_title">
                                                            <a href="{{route('category.news.show',[$ne->category->slug,$ne->c_id])}}">
                                                                {{$ne->title}}
                                                            </a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9 col-xxl-9 ps-5">
                                <div class="w-100 mb-4 newsDetails--content">
                                    {!! $news->description !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 pt-4">
                <div class="aside-news-rows">
                    <div class="bl-newsHeader">
                        <h5 class="header-title">बिएल विशेष</h5>
                    </div>
                    <div class="bl-news bl-news--smallThumbs">
                        <!--repeatable items-->
                        @foreach($blSpecialNews as $key=>$news)
                            <div class="bl-newsPost bl-newsPost--small">
                                <figure class="post_img">
                                    <a href="{{route('category.news.show',[$news->category->slug,$news->c_id])}}">
                                        <img src="{{$news->image}}" alt="{{$news->title}}">
                                    </a>
                                </figure>
                                <div class="post_content">
                                    <h5 class="post_title">
                                        <a href="{{route('category.news.show',[$news->category->slug,$news->c_id])}}">
                                            {{$news->title}}
                                        </a>
                                    </h5>
                                    <p class="post_source">
                                        @if($news->guest)
                                            {{$news->guest}}
                                        @elseif($news->reporter)
                                            {{$news->reporter->name}}
                                        @endif
                                        {{$news->date_line ? '-' .$news->date_line  :''}}
                                    </p>

                                </div>
                            </div>
                            <!--ended repeatable items-->
                        @endforeach
                    </div>
                </div>

                <div class="aside-news-rows">
                    <div class="bl-news bl-news--trending">
                        <div class="post-widgetHeader">
                            <h4>ट्रेन्डिङ</h4>
                        </div>
                        <div class="post-widgetBody">
                            <div class="trendingNews">
                                @foreach($trendingNews as $key =>$news)
                                    <div class="trendingNews-item">
                                        <h5 class="post_title">
                                            <a href="{{route('category.news.show',[$news->category->slug,$news->c_id])}}">
                                                {!! $news->title !!}
                                            </a>
                                        </h5>
                                        <p class="post_source">
                                            @if($news->guest)
                                                {{$news->guest}}
                                            @elseif($news->reporter)
                                                {{$news->reporter->name}}
                                            @endif
                                            {{$news->date_line ? '-' .$news->date_line  :''}}</p>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
