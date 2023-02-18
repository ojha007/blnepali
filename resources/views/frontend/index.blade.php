@extends('frontend.layouts.master')
@section('content')

    <!--Hot carousel news-->
    @include('frontend.components.carousel-news')
    <!--ended Hot carousel news-->

    <!--BL Top post news anchor news-->
    @include('frontend.components.news.anchor-news')
    <!--Ended BL Top post news-->

    <!--BL Special news post order 1-->
    @include('frontend.components.news.bl-special')
    <!--ended BL Special news post-->

    <!--start general news and links news section-->
    <section class="container-fluid container-xxl">
        <div class="news-row">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9 col-xxl-9">
                    @include('frontend.components.news.order-two')
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 col-xxl-3">
                    @include('frontend.components.news.order-three')
                </div>
            </div>
        </div>
    </section>

    <!--ended general news and links news section-->

    <!--start trending and brand story news section-->
    <div class="container-fluid container-xxl">
        <div class="news-row">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 col-xxl-3">
                    @include('frontend.components.news.trending-news')
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9 col-xxl-9">
                    @include('frontend.components.news.order-four')
                </div>

            </div>
        </div>
    </div>

    <!--ended trending and brand story news section-->

    <!--start economy and analysis news block-->
    <section class="container-fluid container-xxl">
        <div class="news-row">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9 col-xxl-9">
                    @include('frontend.components.news.order-five')
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 col-xxl-3">
                    @include('frontend.components.news.order-six')
                </div>
            </div>
        </div>
    </section>
    <!--ended economy and analysis news block-->

    <!--start Entertainment and Blog news block-->
    <section class="container-fluid container-xxl">
        <div class="news-row">
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9 col-xxl-9">
                    @include('frontend.components.news.order-seven')
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 col-xxl-3">
                    @include('frontend.components.news.order-eight')
                </div>
            </div>
        </div>
    </section>
    <!--ended Entertainment and Blog news block-->

    <!--start Video News block-->
    @include('frontend.components.news.videos')
    <!--ended Video News block-->

@endsection

<!--script loading-->

