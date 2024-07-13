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
        {{ print_r($news) }}
        
        <div class="col-md-12 mb-5 related-news-image">
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

<script>
    let elements = document.querySelectorAll('.description-img img');
      elements.forEach(element => {
        element.removeAttribute('style');
        element.setAttribute('style', 'width:100%');
      });

</script>