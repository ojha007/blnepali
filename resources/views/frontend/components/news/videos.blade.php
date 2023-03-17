<section class="container">
    <div class="news-row">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="bl-newsHeader">
                    <h5 class="header-title">भिडियो</h5>
                </div>
                <div class="bl-news bl-news--videoNews">
                    @foreach($videoNews as $key => $news)
                        @if($loop->first)
                            <div class="bl-newsPost bl-newsPost--topVideo">
                                <figure class="post_img">
                                    <a href="{{route('category.news.show',['category'=>$news->category->slug,'c_id'=>$news->c_id])}}">
                                        <img src="{{$news->image}}" alt="Blmedia"/>
                                    </a>
                                </figure>
                                <div class="post_content">
                                    <h5 class="post_title">
                                        <a href="{{route('category.news.show',['category'=>$news->category->slug,'c_id'=>$news->c_id])}}">
                                            {!! $news->title !!}
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        @else
                            <div class="bl-newsPost bl-newsPost--videoThumbnail">
                                <figure class="post_img">
                                    <a href="{{route('category.news.show',['category'=>$news->category->slug,'c_id'=>$news->c_id])}}">
                                        <img src="{{$news->image}}" alt=""/>
                                    </a>
                                </figure>
                                <div class="post_content">
                                    <h5 class="post_title">
                                        <a href="{{route('category.news.show',['category'=>$news->category->slug,'c_id'=>$news->c_id])}}">
                                            {!! $news->title !!}
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
