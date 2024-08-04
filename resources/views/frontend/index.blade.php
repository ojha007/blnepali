@extends('frontend.layouts.master')
@section('content')
    <section class="container">
        @include('frontend.components.news.featured-news')
    </section>
    <section class="container bl-anchor-news">
        @include('frontend.components.news.anchor-news')
    </section>
    <section class="container-fluid my-5 bl-special py-5" style="background-color: #50558b">
        @include('frontend.components.news.bl-special')
    </section>
    <section class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @include('frontend.components.news.order-one')
                </div>
                <div class="col-md-4">
                    @include('frontend.components.news.order-three')
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
                    @include('frontend.components.news.breaking-news')
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

    <section class="container-fluid">
        <div class="container my-2 artha-wrapper">
            <div class="row">
                @include('frontend.components.news.artha')
                @include('frontend.components.news.khel')
                @include('frontend.components.news.jiwansaili')
            </div>
        </div>
    </section>

    @include('frontend.components.news.ghumphir')
    <div class="container">
        @include('frontend.components.news.sahitya')
    </div>
@endsection

