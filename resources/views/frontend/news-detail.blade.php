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
    {{-- <section class="container-fluid container-xxl">
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
                                        {{$news->guest ?? $news->reporter->name ?? ''}}
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
                            @if($news->video_url)
                                {!! $news->video_url !!}
                            @else
                                <img src="{{getResizeImage($news->image)}}" alt="BlMedia"/>
                            @endif
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
                                                            <img src="{{getResizeImage($ne->image)}}" alt=""/>
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
                                        <img src="{{getResizeImage($news->image)}}" alt="{{$news->title}}">
                                    </a>
                                </figure>
                                <div class="post_content">
                                    <h5 class="post_title">
                                        <a href="{{route('category.news.show',[$news->category->slug,$news->c_id])}}">
                                            {{$news->title}}
                                        </a>
                                    </h5>
                                    <p class="post_source">
                                        {{$news->guest ?? $news->reporter->name ?? ''}}
                                        {{$news->date_line ? '-' .$news->date_line  :''}}
                                    </p>

                                </div>
                            </div>
                            <!--ended repeatable items-->
                        @endforeach
                    </div>
                </div>

                <div class="aside-news-rows sticky-xl-top">
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
    </section> --}}
    <div class="container">
        {{ print_r($news) }}
        <div class="row py-5">
            <div class="col-md-8 news-detail">
                <h1 class="fw-bold fs-2 my-4">
                    {!! $news->title !!}
                </h1>
                <div class="d-flex border-top justify-content-between border-bottom py-2 mt-3 align-items-center">
                    <div class="d-flex align-items-center">
                        @if($news->guest)
                        <img class="rounded-circle border p-1" style="width: 40px;height:40px;object-fit:cover" src="{{ asset('frontend/images/blLogo.png') }}"
                             alt="{{$news->guest}}">
                    @elseif($news->reporter)
                    <img class="rounded-circle border p-1" style="width: 40px;height:40px;object-fit:cover"                                src="{{ $news->reporter->image ?? asset('frontend/images/blLogo.png') }}"
                                alt="{{$news->reporter->name}}">
                    @endif
                        <span class="ps-3 souce fw-bold text-muted">
                            {{$news->guest ?? $news->reporter->name ?? ''}}
                        </span>
                    </div>
                    <div class="">
                        <div class='social-share-btns-container'>
                            <div class='social-share-btns'>
                                <a class='share-btn share-btn-twitter' href='https://twitter.com/intent/tweet?text=https://codepen.io/marko-zub/#' rel='nofollow' target='_blank'>
                                    <i class='ion-social-twitter'></i>
                                    Tweet
                                </a>
                                <a class='share-btn share-btn-facebook' href='https://www.facebook.com/sharer/sharer.php?u=https://codepen.io/marko-zub/#' rel='nofollow' target='_blank'>
                                    <i class='ion-social-facebook'></i>
                                    Share
                                </a>
                                <a class='share-btn share-btn-linkedin' href='https://www.linkedin.com/cws/share?url=https://codepen.io/marko-zub/#' rel='nofollow' target='_blank'>
                                    <i class='ion-social-linkedin'></i>
                                    Share
                                </a>
                                <a class='share-btn share-btn-reddit' href='http://www.reddit.com/submit?url=https://codepen.io/marko-zub/&amp;title=Marko+Zub+codepen' rel='nofollow' target='_blank'>
                                    <i class='ion-social-reddit'></i>
                                    Share
                                </a>
                                <a class='share-btn share-btn-mail' href='mailto:?subject=Look Fun Codepen Account&amp;amp;body=https://codepen.io/marko-zub/#' rel='nofollow' target='_blank' title='via email'>
                                    <i class='ion-paper-airplane'></i>
                                    Share
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
    
                @if($news->image)
                <figure>
                    <img src="{{ $news->image }}" alt="{{ $news->image_alt ?? 'News Image' }}" style="width:100%; max-width:100%;">
  
                </figure>
                @endif
    

                <p>
                    {{ $news->description }}
                </p>
                
            </div>
            <div class="col-md-4">
             <div class=" sticky-top"> 
               
                <div class="col-md-12 mb-4">
                    <h5 class="header-title">ब्रेक</h5>
                </div>
                @foreach($trendingNews->take(1) as $key =>$news)

                <div class="border-bottom border-2 pb-2">
                    <figure class="position-relative">
                        <img src="https://www.onlinekhabar.com/wp-content/uploads/2023/10/Leo-Thalapati-Vijay.jpg" alt="">
                    </figure>
                    <a href="">
                        <h1 class="small-title py-1">
                            ‘जम्मु–कश्मीर’ अर्थात् डरै–डरको साम्राज्य!
                        </h1>
                    </a>
                </div>
                @endforeach
                <ul class="list-style list-group mt-3">
                    @foreach($trendingNews as $key =>$news)
                    <li class="m-0 my-2">
                        <a class="d-flex align-items-center a-hover" href="">
                            
                            <h2 class="samaj-title a-hover">
                                {!! $news->title !!}
                            </h2>
                        </a>
                        <span class="souce fw-bold text-muted">
                            बिएल संवाददाता -काठमाडाैँ
                        </span>
                    </li>
                    @endforeach
                </ul>
    
                <div class="col-md-12 my-4">
                    <h5 class="header-title">ट्रेन्डिङ</h5>
                </div>
    
                 <div class="d-flex align-items-center border-bottom mb-3">
          <figure 
             class="post_img">
          <a href="https://breaknlinks.com/np/category/social-10-2-28/news/10">
          <img
             style="    width: 80px;
        height: 80px;"
             src="https://www.onlinekhabar.com/wp-content/uploads/2023/08/Prakriti-Wasti-2.jpg" alt="‘जम्मु–कश्मीर’ अर्थात् डरै–डरको साम्राज्य !">
          </a>
          </figure>
          <div class="ps-3">
          <h5 class="fw-bold medium-title fs-5">
          <a href="https://breaknlinks.com/np/category/social-10-2-28/news/10">
       ज्ञानेन्द्र शाहलाई माधव नेपालको चुनौती : पार्टी खोलेर चुनाव लड्नुस्
    
          </a>
          </h5>
          <p class="text-muted fw-bold">
          बिएल संवाददाता
          
          </p>
          </div>
          </div>
                 <div class="d-flex align-items-center border-bottom mb-3">
          <figure 
             class="post_img">
          <a href="https://breaknlinks.com/np/category/social-10-2-28/news/10">
          <img
             style="    width: 80px;
        height: 80px;"
             src="https://www.onlinekhabar.com/wp-content/uploads/2023/09/Nepal-Cricket-association-CAN.jpg" alt="‘जम्मु–कश्मीर’ अर्थात् डरै–डरको साम्राज्य !">
          </a>
          </figure>
          <div class="ps-3">
          <h5 class="fw-bold medium-title fs-5">
          <a href="https://breaknlinks.com/np/category/social-10-2-28/news/10">
          मन्त्रिपरिषद्‍मा उपप्रधानमन्त्री श्रेष्ठको स्वास्थ्य अवस्थाबारे प्रधानमन्त्रीको ‘ब्रिफिङ’   
    
          </a>
          </h5>
          <p class="text-muted fw-bold">
          बिएल संवाददाता
          
          </p>
          </div>
          </div>
                 <div class="d-flex align-items-center border-bottom mb-3">
          <figure 
             class="post_img">
          <a href="https://breaknlinks.com/np/category/social-10-2-28/news/10">
          <img
             style="    width: 80px;
        height: 80px;"
             src="https://www.onlinekhabar.com/wp-content/uploads/2023/10/Janakpur-Airport-UML-1024x472.jpg" alt="‘जम्मु–कश्मीर’ अर्थात् डरै–डरको साम्राज्य !">
          </a>
          </figure>
          <div class="ps-3">
          <h5 class="fw-bold medium-title fs-5">
          <a href="https://breaknlinks.com/np/category/social-10-2-28/news/10">
          ओलीलाई स्वागत गर्न जनकपुर विमानस्थलको धावनमार्गमै पुगे कार्यकर्ता
          </a>
          </h5>
          <p class="text-muted fw-bold">
          बिएल संवाददाता
          
          </p>
          </div>
          </div>
                 <div class="d-flex align-items-center border-bottom mb-3">
          <figure 
             class="post_img">
          <a href="https://breaknlinks.com/np/category/social-10-2-28/news/10">
          <img
             style="    width: 80px;
        height: 80px;"
             src="https://www.onlinekhabar.com/wp-content/uploads/2023/10/Israel-1-1024x682.jpg" alt="‘जम्मु–कश्मीर’ अर्थात् डरै–डरको साम्राज्य !">
          </a>
          </figure>
          <div class="ps-3">
          <h5 class="fw-bold medium-title fs-5">
          <a href="https://breaknlinks.com/np/category/social-10-2-28/news/10">
          इजरायल आक्रमणमा १० नेपाली मारिएको पुष्टि
    
          </a>
          </h5>
          <p class="text-muted fw-bold">
          बिएल संवाददाता
          
          </p>
          </div>
          </div>
                 <div class="d-flex align-items-center  mb-3">
          <figure 
             class="post_img">
          <a href="https://breaknlinks.com/np/category/social-10-2-28/news/10">
          <img
             style="    width: 80px;
        height: 80px;"
             src="https://i0.wp.com/www.nayapage.com/wp-content/uploads/2023/10/gaun-aayako-bato_7w5cd97j2y.png" alt="‘जम्मु–कश्मीर’ अर्थात् डरै–डरको साम्राज्य !">
          </a>
          </figure>
          <div class="ps-3">
          <h5 class="fw-bold medium-title fs-5">
          <a href="https://breaknlinks.com/np/category/social-10-2-28/news/10">
          ‘जम्मु–कश्मीर’ अर्थात् डरै–डरको साम्राज्य !
          </a>
          </h5>
          <p class="text-muted fw-bold">
          बिएल संवाददाता
          
          </p>
          </div>
          </div>
            </div>
             </div>
        </div>
        <div class="col-md-12 mb-5">
          <h5 class="header-title mb-3">सिफारिश</h5>
    
          <div class="row">
             
             <div class="col-md-3">
                  <div class="card border-0">
              <img src="https://www.onlinekhabar.com/wp-content/uploads/2023/10/Rohit-Poudel-nepali-cricket-team.jpg" class="card-img-top" alt="Card Image">
              <div class="card-body p-0 pt-3 d-flex flex-column">
                <h5 class="card-title small-title">उच्च रक्तचापले मुटुमा पार्न सक्ने ५ घातक असर</h5>
                <p class="card-text mb-4 text-muted">उच्च रक्तचाप भएका व्यक्तिलाई मुटुरोग हुने सम्भावना अधिक हुन्छ । किनकि शरीरमा रक्तचाप बढेको बेला मुटुले बढी दबाबमा काम  हुन्छ...</p>
                </div>
            </div>
                </div>
             <div class="col-md-3">
                  <div class="card border-0">
              <img src="https://www.onlinekhabar.com/wp-content/uploads/2023/10/Ghar-lipne-mato-dashain-768x461.jpg" class="card-img-top" alt="Card Image">
              <div class="card-body p-0 pt-3 d-flex flex-column">
                <h5 class="card-title small-title">उच्च रक्तचापले मुटुमा पार्न सक्ने ५ घातक असर</h5>
                <p class="card-text mb-4 text-muted">उच्च रक्तचाप भएका व्यक्तिलाई मुटुरोग हुने सम्भावना अधिक हुन्छ । किनकि शरीरमा रक्तचाप बढेको बेला मुटुले बढी दबाबमा काम  हुन्छ...</p>
                </div>
            </div>
                </div>
             <div class="col-md-3">
                  <div class="card border-0">
              <img src="https://www.onlinekhabar.com/wp-content/uploads/2023/10/u-19-nepali-cricket-toli.jpg" class="card-img-top" alt="Card Image">
              <div class="card-body p-0 pt-3 d-flex flex-column">
                <h5 class="card-title small-title">उच्च रक्तचापले मुटुमा पार्न सक्ने ५ घातक असर</h5>
                <p class="card-text mb-4 text-muted">उच्च रक्तचाप भएका व्यक्तिलाई मुटुरोग हुने सम्भावना अधिक हुन्छ । किनकि शरीरमा रक्तचाप बढेको बेला मुटुले बढी दबाबमा काम  हुन्छ...</p>
                </div>
            </div>
                </div>
             <div class="col-md-3">
                  <div class="card border-0">
              <img src="https://www.onlinekhabar.com/wp-content/uploads/2023/10/Chatpate-Sindhuli-mai-270x170.jpg" class="card-img-top" alt="Card Image">
              <div class="card-body p-0 pt-3 d-flex flex-column">
                <h5 class="card-title small-title">उच्च रक्तचापले मुटुमा पार्न सक्ने ५ घातक असर</h5>
                <p class="card-text mb-4 text-muted">उच्च रक्तचाप भएका व्यक्तिलाई मुटुरोग हुने सम्भावना अधिक हुन्छ । किनकि शरीरमा रक्तचाप बढेको बेला मुटुले बढी दबाबमा काम  हुन्छ...</p>
                </div>
            </div>
                </div>
             </div>
          </div>
    </div>
@endsection
