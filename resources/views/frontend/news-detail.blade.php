@extends('frontend.layouts.master')
@section('title')
    {!! $news->title !!}
@endsection
@section('meta')
    <meta property="og:type" content="article"/>
    <meta property="og:url"
          content="{{route('category.news.show', [$news->category->slug, $news->c_id]) }}"/>
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
          content="{{route('category.news.show', [$news->category->slug, $news->c_id]) }}"/>
    <meta name="twitter:title" content="{{$news->title}}"/>
    <meta name="twitter:image:src" content="{{$news->image}}"/>
    <meta name="twitter:description" content="{{$news->short_description}}"/>
@endsection
@section('content')
    @if(isset($news))
        <div class="container">
            <div class="row py-4">
                <div class="col-md-8 news-detail ">
                    <h1 class="fw-bold text-left fs-1 my-4">
                        {!! $news->title !!}
                    </h1>

                    <a class="w-full">
                        <div
                            class="d-flex border-top justify-content-between border-bottom py-2  mt-3 mb-3 align-items-center">
                            <div class="d-flex align-items-center">
                                @if(isset($news->guest))
                                    <img class="rounded-circle border p-1"
                                         style="width: 40px; height:40px; object-fit:cover"
                                         src="{{ $news->guest->image ?? asset('frontend/images/bl-logo.png') }}"
                                         alt="{{ $news->guest->name }}">
                                @elseif(isset($news->reporter))
                                    <img class="rounded-circle border p-1"
                                         style="width: 40px; height:40px; object-fit:cover"
                                         src="{{ $news->reporter->image ?? asset('frontend/images/bl-logo.png') }}"
                                         alt="{{ $news->reporter->name ?? $news->reporter->name ?? '' }}">
                                @endif

                                <span class="ps-3 souce fw-bold text-muted">
                                {{ $news->guest->name ?? $news->reporter->name ?? '' }}
                                <br/>
                               <span style="font-size:13px">{{ $news->date_line}}</span>
                              </span>
                            </div>

                            <div class="d-flex">
                                <div class='social-share-btns-container'>
                                    <div class="sharethis-inline-share-buttons"></div>
                                </div>
                                <div id="copy">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                         class="bi bi-copy" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        @if($news->image)
                            <figure class="position-relative">
                                <img src="{{ $news->image }}" alt="{{ $news->image_alt ?? 'News Image' }}"
                                     style="width:100%; max-width:100%;">
                                <figcaption>
                                <span>
                                    {{ $news->image_description }}
                                </span>
                                </figcaption>
                            </figure>

                        @endif

                        <div class="d-flex util flex-row align-items-center ">
                            <div id="plus">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                     class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg>
                            </div>
                            <div id="reset" class="mx-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                     class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                    <path
                                        d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9"/>
                                    <path fill-rule="evenodd"
                                          d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
                                </svg>
                            </div>
                            <div id="minus">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                     class="bi bi-dash-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                                </svg>
                            </div>
                        </div>
                    </a>

                    <div class="description-img mt-3">
                        <p>
                            {!! $news->description !!}
                        </p>

                        <hr>
                        <h5 class="my-2 text-center">
                            यो समाचार पढेपछि तपाईलाई कस्तो लाग्यो?
                        </h5>
                        <!-- ShareThis BEGIN -->
                        <div class="sharethis-inline-reaction-buttons"></div><!-- ShareThis END -->
                    </div>

                    <div class="col-md-12 mb-5 mt-3 related-news-image">
                        <h5 class="header-title mb-3">सम्बन्धित खवर</h5>


                        @foreach($sameCategoryNews as $smNews)
                            <a href="{{ route('category.news.show', [$smNews->category->slug, $smNews->c_id]) }}"
                               class="row">
                                <div class="col-md-4">
                                    <div class="card border-0">
                                        <img src="{{ $smNews->image }}" class="card-img-top"
                                             alt="{{ $smNews->image_alt }}">
                                        <div class="card-body p-0 pt-3 d-flex flex-column">
                                            <h5 class="card-title small-title">{{ $smNews->title }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="col-md-12 mb-5 mt-3 related-news-image">
                        <h5 class="header-title mb-3">अन्य समाचर</h5>

                        @foreach($similarNews ?? [] as $sNews)
                            <a href="{{ route('category.news.show', [$sNews->category->slug, $sNews->c_id]) }}"
                               class="row">
                                <div class="col-md-4 mb-4">
                                    <div class="card border-0">
                                        <img src="{{ $sNews->image }}" class="card-img-top"
                                             alt="{{ $sNews->image_alt }}">
                                        <div class="card-body p-0 pt-3 d-flex flex-column">
                                            <h5 class="card-title small-title">{{ $sNews->title }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class=" sticky-top">
                        <div class="col-md-12 my-4">
                            <a href="{{route('newsByCategory','special')}}">
                                <h5 class="header-title">बिएल विशेष</h5>
                            </a>
                        </div>
                        @foreach($blSpecialNews ?? [] as $bNews)
                            <div class="d-flex align-items-center border-bottom mb-3">
                                <figure class="post_img">
                                    <a href="{{ route('category.news.show', [$bNews->category_slug, $bNews->c_id]) }}">
                                        <img style="width: 80px; height: 80px;" src="{{ $bNews->image }}"
                                             alt="{{ $bNews->image_alt }}">
                                    </a>
                                </figure>
                                <div class="ps-3">
                                    <h5 class="fw-bold medium-title fs-5">
                                        <a href="{{ route('category.news.show', [$bNews->category_slug, $bNews->c_id]) }}">{{ $news->title }}</a>
                                    </h5>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-md-12 mb-4">
                            <h5 class="header-title">ब्रेक</h5>
                        </div>
                        @foreach($breakingNews->take(1) as $brNews)
                            <a href="{{ route('category.news.show', [$brNews->category_slug, $brNews->c_id]) }}">
                                <div class="border-bottom border-2 pb-2">
                                    <figure class="position-relative">
                                        <img src="{{ $brNews->image }}" alt="{{ $brNews->image_alt }}"
                                             class="img-fluid">
                                    </figure>
                                    <h1 class="small-title py-1">
                                        {!! $brNews->title !!}
                                    </h1>
                                </div>
                            </a>
                        @endforeach

                        <ul class="list-style list-group mt-3">
                            @foreach($breakingNews->skip(1) as $key => $brNews)
                                <li class="m-0 my-2">
                                    <a href="{{ route('category.news.show', [$brNews->category_slug, $brNews->c_id]) }}"
                                       class="d-flex align-items-center a-hover">
                                        <h2 class="samaj-title a-hover">
                                            {!! $brNews->title !!}
                                        </h2>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="col-md-12 my-4">
                            <h5 class="header-title">ट्रेन्डिङ</h5>
                        </div>
                        @foreach($trendingNews as $trNews)
                            <div class="d-flex align-items-center border-bottom mb-3">
                                <figure class="post_img">
                                    <a href="{{ route('category.news.show', [$trNews->category_slug, $trNews->c_id]) }}">
                                        <img style="width: 80px; height: 80px;" src="{{ $trNews->image }}"
                                             alt="{{ $trNews->image_alt }}">
                                    </a>
                                </figure>
                                <div class="ps-3">
                                    <h5 class="fw-bold medium-title fs-5">
                                        <a href="{{ route('category.news.show', [$trNews->category_slug, $trNews->c_id]) }}">{{ $news->title }}</a>
                                    </h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Handle image styling
        let elements = document.querySelectorAll('.description-img img');
        elements.forEach(element => {
            element.removeAttribute('style');
            element.setAttribute('style', 'width:100%');
        });

        // Handle copy functionality
        let copy = document.querySelector('#copy');
        if (copy) {
            copy.addEventListener('click', function () {
                let url = window.location.href;
                navigator.clipboard.writeText(url);
                copy.appendChild(document.createTextNode('Copied!'));
                setTimeout(() => {
                    copy.removeChild(copy.lastChild);
                }, 500);
            });
        }

        // Handle font size adjustments
        let plus = document.querySelector('#plus');
        let minus = document.querySelector('#minus');
        let reset = document.querySelector('#reset');

        plus.addEventListener('click', function () {
            let elements = document.querySelectorAll('.description-img p');
            elements.forEach(element => {
                let fontSize = window.getComputedStyle(element, null).getPropertyValue('font-size');
                if (fontSize === '40px') {
                    return;
                }
                let currentSize = parseFloat(fontSize);
                let newSize = currentSize + 1;
                element.style.fontSize = newSize + 'px';
            });
        });

        minus.addEventListener('click', function () {
            let elements = document.querySelectorAll('.description-img p');
            elements.forEach(element => {
                let fontSize = window.getComputedStyle(element, null).getPropertyValue('font-size');
                if (fontSize === '16px') {
                    return;
                }
                let currentSize = parseFloat(fontSize);
                let newSize = currentSize - 1;
                element.style.fontSize = newSize + 'px';
            });
        });

        reset.addEventListener('click', function () {
            let elements = document.querySelectorAll('.description-img p');
            elements.forEach(element => {
                element.style.fontSize = '22px';
            });
        });
    });
</script>
