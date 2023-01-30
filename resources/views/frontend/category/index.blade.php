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
            <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9">
                <div class="news-row">
                    @if(!$news->isEmpty())
                        <div class="bl-newsHeader">
                            <h5 class="header-title">{{$news->first()->category->name}}</h5>
                        </div>
                    @endif
                    <div class="bl-news bl-news--condensed">
                        @foreach($news as $key=>$item)
                            @if($key === 0)
                                <div class="bl-news-condensed-item bl-news-condensed-item--highlight">
                                    <div class="bl-newsPost">
                                        <figure class="post_img">
                                            <a href="{{route('category.news.show',['category'=>$item->category->slug,'c_id'=>$item->c_id])}}">
                                                <img src="{{$item->image}}" alt="{{$item->image_description}}"/>
                                            </a>
                                        </figure>
                                        <div class="post_content">
                                            <h5 class="post_title">
                                                <a href="{{route('category.news.show',['category'=>$item->category->slug,'c_id'=>$item->c_id])}}">
                                                    {{$item->title}}
                                                </a>
                                            </h5>
                                            <p>{{$item->short_description}}</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="bl-news-condensed-item">
                                    <div class="bl-newsPost">
                                        <figure class="post_img">
                                            <a href="{{route('category.news.show',['category'=>$item->category->slug,'c_id'=>$item->c_id])}}">
                                                <img src="{{$item->image}}" alt="{{$item->image_description}}"/>
                                            </a>
                                        </figure>
                                        <div class="post_content">
                                            <h5 class="post_title">
                                                <a href="{{route('category.news.show',['category'=>$item->category->slug,'c_id'=>$item->c_id])}}">
                                                    {{$item->title}}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        {{$news->links()}}
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 pt-4">

                <div class="aside-news-rows">
                    <div class="bl-news bl-news--trending">
                        <div class="post-widgetHeader">
                            <h4>Trending</h4>
                        </div>
                        <div class="post-widgetBody">
                            <div class="trendingNews">
                                <!--repeatable item-->
                                @foreach($trendingNews ?? [] as $news)
                                    <div class="trendingNews-item">
                                        <h5 class="post_title">
                                            <a href="{{route('category.news.show',['category'=>$news->category->slug,'c_id'=>$news->c_id])}}">
                                                {{$news->title}}</a>
                                        </h5>
                                        <span
                                            class="post_source">
                                            {{$news->guest ?? $news->reporter->name}}
                                            {{$news->date_line ? '- '. $news->date_line : ''}}
                                        </span>
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
