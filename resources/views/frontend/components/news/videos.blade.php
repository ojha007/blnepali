<section class="container">
    <div class="news-row">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="bl-newsHeader">
                    <h5 class="header-title">भिडियो</h5>
                </div>
                <div class="bl-news bl-news--videoNews">
                    @foreach($videoNews as $key => $news)
                        @if($key ==0)
                            <div class="bl-newsPost bl-newsPost--topVideo">
                                <figure class="post_img">
                                    <a href="#">
                                        <img src="{{$news->image}}" alt=""/>
                                    </a>
                                </figure>
                                <div class="post_content">
                                    <h5 class="post_title"><a href="#">{!! $news->title !!} </a></h5>

                                </div>
                            </div>
                        @else
                            <div class="bl-newsPost bl-newsPost--videoThumbnail">
                                <figure class="post_img">
                                    <a href="#">
                                        <img src="{{$news->image}}" alt=""/>
                                    </a>
                                </figure>
                                <div class="post_content">
                                    <h5 class="post_title">
                                        <a href="#">{!! $news->title !!}</a></h5>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
