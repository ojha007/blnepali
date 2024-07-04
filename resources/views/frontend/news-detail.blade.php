@extends('frontend.layouts.master')
@section('title')
    {{$news->title}}
@endsection
@section('meta')
    <meta property="og:type" content="article"/>
    <meta property="og:url"
          content="{{ route('showDetail', ['c_id' => $news->c_id]) }}"/>
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
          content="{{ route('showDetail', ['c_id' => $news->c_id]) }}"/>
    <meta name="twitter:title" content="{{$news->title}}"/>
    <meta name="twitter:image:src" content="{{$news->image}}"/>
    <meta name="twitter:description" content="{{$news->short_description}}"/>
@endsection
@section('content')
@if(isset($news))

    <div class="container">
        {{-- {{ print_r($news) }} --}}
        <div class="row py-5">
            <div class="col-md-8 news-detail">
                <h1 class="fw-bold fs-2 my-4">
                    {!! $news->title !!}
                </h1>
                <a class="w-full" href="{{ route('newsByAuthor', ['reporter_id' => $news->reporter_id]) }}">
                <div class="d-flex border-top justify-content-between border-bottom py-2 mt-3 align-items-center">
                    <div class="d-flex align-items-center">
                        @if(isset($news->guest))
                        <img class="rounded-circle border p-1" style="width: 40px; height:40px; object-fit:cover" 
                             src="{{ asset('frontend/images/blLogo.png') }}" 
                             alt="{{ $news->guest->name }}">
                    @elseif(isset($news->reporter))
                        <img class="rounded-circle border p-1" style="width: 40px; height:40px; object-fit:cover" 
                             src="{{ $news->reporter->image ?? asset('frontend/images/blLogo.png') }}" 
                             alt="{{ $news->reporter->name }}">
                    @endif
                    
                    <span class="ps-3 souce fw-bold text-muted">
                        {{ $news->guest->name ?? $news->reporter->name ?? '' }}
                    </span>
                    </div>
                    <div class="">
                        <div class='social-share-btns-container'>
                            <div class="sharethis-inline-share-buttons"></div>
                        </div>
                    </div>
                </div>
            </a>
                @if($news->image)
                <figure>
                    <img src="{{ $news->image }}" alt="{{ $news->image_alt ?? 'News Image' }}" style="width:100%; max-width:100%;">
  
                </figure>
                @endif
    

                <p>
                    {!! $news->description !!}
                </p>
                
            </div>
            <div class="col-md-4">
             <div class=" sticky-top"> 
               
                <div class="col-md-12 mb-4">
                    <h5 class="header-title">ब्रेक</h5>
                </div>
                @foreach($breakingNews->take(1) as $key =>$news)

                <div class="border-bottom border-2 pb-2">
                    <figure class="position-relative">
                            <img src="{{ $news->image }}" alt="{{ $news->image_alt }}" class="img-fluid">
                     
                    </figure>
                    <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}">
                        <h1 class="small-title py-1">
                            {!! $news->title !!}
                        </h1>
                    </a>
                </div>
                @endforeach
                <ul class="list-style list-group mt-3">
                    @foreach($breakingNews->skip(1) as $key =>$news)
                    <li class="m-0 my-2">
                        <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}" class="d-flex align-items-center a-hover" href="">
                            
                            <h2 class="samaj-title a-hover">
                                {!! $news->title !!}
                            </h2>
                        </a>
                        {{-- <span class="souce fw-bold text-muted">
                            @if($news->guest)
                                {{$news->guest}}
                            @elseif($news->reporter)
                                {{$news->reporter->name}}
                            @endif
                            {{$news->date_line ? '-' .$news->date_line  :''}}

                        </span> --}}
                    </li>
                    @endforeach
                </ul>
    
                <div class="col-md-12 my-4">
                    <h5 class="header-title">ट्रेन्डिङ</h5>
                </div>
                @foreach($trendingNews as $news)
                <div class="d-flex align-items-center border-bottom mb-3">
                    <figure class="post_img">
                        <a href="{{ route('showDetail', ['c_id' => $news->id]) }}">
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
        <div class="col-md-12 mb-5">
          <h5 class="header-title mb-3">सिफारिश</h5>
    
          <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}" class="row">
            @foreach($sameCategoryNews as $news)
                <div class="col-md-3">
                    <div class="card border-0">
                        <img src="{{ $news->image }}" class="card-img-top" alt="{{ $news->image_alt }}">
                        <div class="card-body p-0 pt-3 d-flex flex-column">
                            <h5 class="card-title small-title">{{ $news->title }}</h5>
                            {{-- <p class="card-text mb-4 text-muted">{{ $news->description }}</p> --}}
                        </div>
                    </div>
                </div>
            @endforeach
          </a>
        </div>
        
    </div>
    @else
    <p>No news found.</p>
@endif
@endsection
