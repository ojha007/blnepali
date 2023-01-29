@extends('frontend.layouts.master')
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9">
                <div class="bl-newsPost--details">
                    <div class="bl-post--header">
                        <div class="bl-post--meta">
                            <div class="post-meta-item cat-labels">
                                <a href="#" class="meta-category">{{$news->category}}</a>
                            </div>
                            <div class="post-meta-item post-title">
                                <h1>{!! $news->title !!}</h1>
                            </div>
                            <div class="post-meta-item meta-reporter">
                                <div class="meta-author-info">
                                    <span class="has-author-img">
                                        <img src="{{$news->reporter_img ?? $news->guest_img}}"
                                             alt="{{ $news->reporter  ?? $news->guest}}">
                                    </span>
                                    <span class="post-by">
                                        <a href="#">
                                            {{ $news->reporter  ?? $news->guest}}
                                        </a>
                                    </span>
                                </div>
                                <div class="post-date">
                                    {{\Carbon\Carbon::parse($news->publish_date)->format('Y m d H:i A')}}</div>
                            </div>

                        </div>
                    </div>
                    <div class="bl-post--banner">
                        <figure class="primaryImage">
                            <img src="{{$news->image}}" alt="BlMedia"/>
                        </figure>

                        <div class="primaryImage-caption">
                            Lorem ipsum dolor sit amet is simply dummy text for the web and printing media since 1950.
                        </div>
                    </div>
                    <div class="bl-newsPost--details-story">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 col-xxl-3 pe-4">
                                <div class="aside-right-seperator">
{{--                                    <div class="aside-news-rows">--}}
{{--                                        <div class="news-reporter-info">--}}
{{--                                            <div class="reporter-avatar">--}}
{{--                                                <img src="assets/images/newsImages/bl-news-img-10.webp"/>--}}
{{--                                            </div>--}}
{{--                                            <div class="reporter-info">--}}
{{--                                                <h6 class="reporter-title">Jesica Johnson</h6>--}}
{{--                                                <p class="news-timestamp">Washington DC, New York</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="aside-news-rows">
                                        <div class="bl-newsHeader header-center">
                                            <h5 class="header-title">Related News</h5>
                                        </div>
                                        <div class="bl-news bl-news--verticalThumbs">
                                         @foreach($sameCategoryNews as $key=>$ne)
                                            <div class="bl-newsPost bl-newsPost--thumbnail">
                                                <figure class="post_img">
                                                    <a href="#">
                                                        <img src="{{$ne->image}}" alt=""/>
                                                    </a>
                                                </figure>
                                                <div class="post_content">
                                                    <h5 class="post_title">
                                                        <a href="#">{{$ne->title}}</a></h5>

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

{{--                                <div class="w-100">--}}
{{--                                    <div class="bl-newsPost--reviews">--}}
{{--                                        <div class="reviews-header">--}}
{{--                                            <h4>Reviews <span class="count-badge">3</span></h4>--}}
{{--                                            <button class="btn btn-white-outline">Write Review</button>--}}
{{--                                        </div>--}}
{{--                                        <div class="reviews-body">--}}
{{--                                            <div class="reviewer-login">--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">--}}
{{--                                                        <form class="base-form">--}}

{{--                                                            <div class="input-group mb-3">--}}
{{--                                                                <div class="input-group-text"><i class="fa fa-user"></i>--}}
{{--                                                                </div>--}}
{{--                                                                <input type="text" name="userLoginID"--}}
{{--                                                                       class="form-control"--}}
{{--                                                                       placeholder="User Name of Email"/>--}}
{{--                                                            </div>--}}

{{--                                                            <div class="input-group mb-3">--}}
{{--                                                                <div class="input-group-text"><i class="fa fa-lock"></i>--}}
{{--                                                                </div>--}}
{{--                                                                <input type="password" name="userLoginPW"--}}
{{--                                                                       class="form-control" placeholder="**********"/>--}}
{{--                                                            </div>--}}

{{--                                                            <div--}}
{{--                                                                class="w-100 mb-3 d-flex flex-row align-items-center justify-content-between">--}}
{{--                                                                <div class="form-check">--}}
{{--                                                                    <input class="form-check-input" type="checkbox"--}}
{{--                                                                           value=""--}}
{{--                                                                           id="loginRemember">--}}
{{--                                                                    <label class="form-check-label" for="loginRemember">--}}
{{--                                                                        Remember Me--}}
{{--                                                                    </label>--}}
{{--                                                                </div>--}}

{{--                                                                <div class="w-auto">--}}
{{--                                                                    <a href="#">Forgot Password?</a>--}}
{{--                                                                </div>--}}

{{--                                                            </div>--}}
{{--                                                            <div class="w-100 d-grid gap-2">--}}
{{--                                                                <button type="submit" name="loginReviewer"--}}
{{--                                                                        class="btn btn-primary">Login--}}
{{--                                                                </button>--}}
{{--                                                                <div class="form-text">Don't have and Account? <a--}}
{{--                                                                        href="#">Register--}}
{{--                                                                        Now</a></div>--}}

{{--                                                            </div>--}}

{{--                                                        </form>--}}

{{--                                                        <div class="social-login">--}}
{{--                                                            <h6>Login with Socialmedia</h6>--}}

{{--                                                            <div--}}
{{--                                                                class="w-100 mt-3 d-flex align-items-center justify-content-center gap-3">--}}

{{--                                                                <a href="#" class="btn btn-fb-login">--}}
{{--                                                                    <i class="fab fa-facebook-f"></i>--}}
{{--                                                                </a>--}}
{{--                                                                <a href="#" class="btn btn-twitter-login">--}}
{{--                                                                    <i class="fab fa-twitter"></i>--}}
{{--                                                                </a>--}}
{{--                                                                <a href="#" class="btn btn-google-login"><i--}}
{{--                                                                        class="fab fa-google">--}}
{{--                                                                    </i>--}}
{{--                                                                </a>--}}

{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">--}}
{{--                                                        <div class="review-terms">--}}
{{--                                                            <h6>Review Terms and Conditions</h6>--}}

{{--                                                            <ul class="terms-list">--}}
{{--                                                                <li class="list-item">--}}
{{--                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing--}}
{{--                                                                    elit.--}}
{{--                                                                </li>--}}
{{--                                                                <li class="list-item">Aenean sit amet nibh consectetur--}}
{{--                                                                    diam--}}
{{--                                                                    imperdiet porttitor.--}}
{{--                                                                </li>--}}
{{--                                                                <li class="list-item">Aenean non enim non mauris tempus--}}
{{--                                                                    lacinia.--}}
{{--                                                                </li>--}}

{{--                                                                <li class="list-item">Etiam quis turpis et sem fringilla--}}
{{--                                                                    laoreet--}}
{{--                                                                    in non erat.--}}
{{--                                                                </li>--}}
{{--                                                                <li class="list-item">Quisque sit amet tellus a quam--}}
{{--                                                                    ultricies--}}
{{--                                                                    scelerisque a a nulla.--}}
{{--                                                                </li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="review-lists">--}}
{{--                                                <div class="review-items">--}}
{{--                                                    <div class="reviewer-avatar">--}}
{{--                                                        <img src="assets/images/newsImages/bl-news-img-10.webp"/>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="review-content">--}}
{{--                                                        <h6 class="reviewer-name">Jesika Johnson</h6>--}}
{{--                                                        <p class="review-date-times"><span>25 July, 2022</span>--}}
{{--                                                            <span>13:00</span></p>--}}
{{--                                                        <p class="review-text">Lorem Ipsum is simply dummy text of the--}}
{{--                                                            printing and typesetting industry. Lorem Ipsum has been the--}}
{{--                                                            industry's standard dummy text ever since the 1500s, when an--}}
{{--                                                            unknown printer took a galley of type and scrambled it to--}}
{{--                                                            make a--}}
{{--                                                            type specimen book. It has survived not only five centuries,--}}
{{--                                                            but--}}
{{--                                                            also the leap into electronic typesetting, remaining--}}
{{--                                                            essentially--}}
{{--                                                            unchanged.</p>--}}
{{--                                                        <ul class="reviews-meta">--}}
{{--                                                            <li class="meta-item"><i class="fa fa-comment-dots"></i> 5--}}
{{--                                                                Comments--}}
{{--                                                            </li>--}}
{{--                                                            <li class="meta-item"><i class="fa fa-thumbs-up"></i> 5--}}
{{--                                                                Likes--}}
{{--                                                            </li>--}}
{{--                                                            <li class="meta-item"><i class="fa fa-thumbs-down"></i> 5--}}
{{--                                                                Unlike--}}
{{--                                                            </li>--}}
{{--                                                            <li class="meta-item"><a href="#" class="report"><i--}}
{{--                                                                        class="fa fa-flag"></i> 5 Report</a></li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="review-items">--}}
{{--                                                    <div class="reviewer-avatar">--}}
{{--                                                        <img src="assets/images/newsImages/bl-news-img-10.webp"/>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="review-content">--}}
{{--                                                        <h6 class="reviewer-name">Jesika Johnson</h6>--}}
{{--                                                        <p class="review-date-times"><span>25 July, 2022</span>--}}
{{--                                                            <span>13:00</span></p>--}}
{{--                                                        <p class="review-text">Lorem Ipsum is simply dummy text of the--}}
{{--                                                            printing and typesetting industry. Lorem Ipsum has been the--}}
{{--                                                            industry's standard dummy text ever since the 1500s, when an--}}
{{--                                                            unknown printer took a galley of type and scrambled it to--}}
{{--                                                            make a--}}
{{--                                                            type specimen book. It has survived not only five centuries,--}}
{{--                                                            but--}}
{{--                                                            also the leap into electronic typesetting, remaining--}}
{{--                                                            essentially--}}
{{--                                                            unchanged.</p>--}}
{{--                                                        <ul class="reviews-meta">--}}
{{--                                                            <li class="meta-item"><i class="fa fa-comment-dots"></i> 5--}}
{{--                                                                Comments--}}
{{--                                                            </li>--}}
{{--                                                            <li class="meta-item"><i class="fa fa-thumbs-up"></i> 5--}}
{{--                                                                Likes--}}
{{--                                                            </li>--}}
{{--                                                            <li class="meta-item"><i class="fa fa-thumbs-down"></i> 5--}}
{{--                                                                Unlike--}}
{{--                                                            </li>--}}
{{--                                                            <li class="meta-item"><a href="#" class="report"><i--}}
{{--                                                                        class="fa fa-flag"></i> 5 Report</a></li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="review-items">--}}
{{--                                                    <div class="reviewer-avatar">--}}
{{--                                                        <img src="assets/images/newsImages/bl-news-img-10.webp"/>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="review-content">--}}
{{--                                                        <h6 class="reviewer-name">Jesika Johnson</h6>--}}
{{--                                                        <p class="review-date-times"><span>25 July, 2022</span>--}}
{{--                                                            <span>13:00</span></p>--}}
{{--                                                        <p class="review-text">Lorem Ipsum is simply dummy text of the--}}
{{--                                                            printing and typesetting industry. Lorem Ipsum has been the--}}
{{--                                                            industry's standard dummy text ever since the 1500s, when an--}}
{{--                                                            unknown printer took a galley of type and scrambled it to--}}
{{--                                                            make a--}}
{{--                                                            type specimen book. It has survived not only five centuries,--}}
{{--                                                            but--}}
{{--                                                            also the leap into electronic typesetting, remaining--}}
{{--                                                            essentially--}}
{{--                                                            unchanged.</p>--}}
{{--                                                        <ul class="reviews-meta">--}}
{{--                                                            <li class="meta-item"><i class="fa fa-comment-dots"></i> 5--}}
{{--                                                                Comments--}}
{{--                                                            </li>--}}
{{--                                                            <li class="meta-item"><i class="fa fa-thumbs-up"></i> 5--}}
{{--                                                                Likes--}}
{{--                                                            </li>--}}
{{--                                                            <li class="meta-item"><i class="fa fa-thumbs-down"></i> 5--}}
{{--                                                                Unlike--}}
{{--                                                            </li>--}}
{{--                                                            <li class="meta-item"><a href="#" class="report"><i--}}
{{--                                                                        class="fa fa-flag"></i> 5 Report</a></li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
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
                                    <a href="{{route('category.news.show',[$news->category_slug,$news->c_id])}}">
                                        <img src="{{$news->image}}" alt="{{$news->title}}">
                                    </a>
                                </figure>
                                <div class="post_content">
                                    <h5 class="post_title">
                                        <a href="{{route('category.news.show',[$news->category_slug,$news->c_id])}}">
                                            {{$news->title}}
                                        </a>
                                    </h5>
                                    <p class="post_source">{{$news->author??''}} {{$news->date_line ? '-' .$news->date_line  :''}}</p>

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
                                            <a href="#">{{$news->title}}</a>
                                        </h5>
                                        <p class="post_source">
                                            {{$news->reporter??$news->guest}}
                                            {{$news->date_line ? '-' .$news->date_line  :''}}</p>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="news-details">

            </section>
        </div>
    </section>
@endsection
