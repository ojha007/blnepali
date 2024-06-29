@extends('frontend.layouts.master')
@section('content')

    <section class="container">
        @include('frontend.components.news.featured-news')
    </section>
    <section class="container bl-anchor-news">
        @include('frontend.components.news.anchor-news')
    </section>
    <section class="container-fluid my-5 bl-special py-5" style="background-color: #082332">
        @include('frontend.components.news.bl-special')
    </section>

    <section class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @include('frontend.components.news.order-one')
                </div>
                <div class="col-md-4">
                    @include('frontend.components.news.breaking-news')
                </div>
            </div>
        </div>
    </section>

    @include('frontend.components.news.trending-news')

    <section class="container-fluid py-5  my-5" style="background-color: #082332;" id="video_section">
        @include('frontend.components.news.videos')
    </section>

    <section class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @include('frontend.components.news.order-two')
                </div>
                <div class="col-md-4">
                    @include('frontend.components.news.order-three')
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid py-1">
        <div class="container my-4">
            <div class="row">
                <div class="col-md-8">
                    @include('frontend.components.news.order-four')
                </div>
                <div class="col-md-4">
                    @include('frontend.components.news.order-five')
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid py-1">
        <div class="container my-4">
                <div class="row">
                    @include('frontend.components.news.artha')
                    @include('frontend.components.news.khel')
                    @include('frontend.components.news.jiwansaili')
                </div>
                </div>
        </div>
    </section>

    @include('frontend.components.news.ghumphir')


    <section class="container my-5">
        <div class="row">
    @include('frontend.components.news.brand-story')
          
    @include('frontend.components.news.sahitya')
           
        </div>
     </section>
    

    <!--ended general news and links news section-->

    <!--start trending and brand story news section-->
    {{--    <div class="container">--}}
    {{--        <div class="news-row">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 col-xxl-3">--}}
    {{--                    @include('frontend.components.news.trending-news')--}}
    {{--                </div>--}}
    {{--                <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9 col-xxl-9">--}}
    {{--                    @include('frontend.components.news.order-four')--}}
    {{--                </div>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <!--ended trending and brand story news section-->

    <!--start economy and analysis news block-->
    {{--    <section class="container">--}}
    {{--        <div class="news-row">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9 col-xxl-9">--}}
    {{--                    @include('frontend.components.news.order-five')--}}
    {{--                </div>--}}
    {{--                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 col-xxl-3">--}}
    {{--                    @include('frontend.components.news.order-six')--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!--ended economy and analysis news block-->

    <!--start Entertainment and Blog news block-->
    {{--    <section class="container">--}}
    {{--        <div class="news-row">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-sm-12 col-md-8 col-lg-9 col-xl-9 col-xxl-9">--}}
    {{--                    @include('frontend.components.news.order-seven')--}}
    {{--                </div>--}}
    {{--                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 col-xxl-3">--}}
    {{--                    @include('frontend.components.news.order-eight')--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!--ended Entertainment and Blog news block-->

    <!--start Video News block-->
    {{--    @include('frontend.components.news.videos')--}}
    <!--ended Video News block-->

@endsection

<!--script loading-->

