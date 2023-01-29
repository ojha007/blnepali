<section class="container blSpecial-container">
    <div class="row">
        <div class="news-row">
            <div class="bl-newsHeader">
                <h5 class="header-title">बिएल विशेष</h5>
            </div>
            <div class="bl-news bl-news--blSpecial">
                @foreach($blSpecialNews as $news)
                    <div class="bl-newsPost bl-newsPost--thumbnail">
                        <figure class="post_img">
                            <a href="{{route('category.news.show',[$news->category_slug,$news->c_id])}}">
                                <img src="{{$news->image}}"
                                     alt="{{$news->title}}">
                            </a>
                        </figure>
                        <div class="post_content">
                            <h5 class="post_title">
                                <a href="{{route('category.news.show',[$news->category_slug,$news->c_id])}}">
                                    {{$news->title}}
                                </a>
                            </h5>
                            <p class="post_source">
                                {{$news->reporter ?? $news->guest}}
                                {{$news->date_line ? '-' .$news->date_line  :''}}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
