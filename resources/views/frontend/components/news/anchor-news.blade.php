<section class="container-fluid container-xxl">
    <div class="row">
        <section class="news-row">
            <div class="bl-newsHeader">
                <h5 class="header-title">एंकर</h5>
            </div>
            <div class="bl-news bl-news--mainPost">
                @foreach($anchorNews as $key=>$news)
                    @if($key ==0)
                        <div class="bl-newsPost bl-newsPost--topStory">
                            <figure class="post_img">
                                <a href="{{route('category.news.show',[$news->category_slug,'c_id'=>$news->c_id])}}">
                                    <img src="{{$news->image}}"
                                         alt="{!! $news->title !!}"/>
                                </a>
                            </figure>
                            <div class="post_content">
                                <h5 class="post_title">
                                    <a href="{{route('category.news.show',[$news->category_slug,$news->c_id])}}">
                                        {{$news->title}}
                                    </a>
                                </h5>
                                <p>{!!\Illuminate\Support\Str::limit($news->short_description)!!}</p>
                                <p class="post_source">
                                    {{$news->guest ?? $news->reporter_name}}
                                    {{$news->date_line ? '-' .$news->date_line  :''}}
                                </p>
                            </div>
                        </div>
                    @else
                        <div class="bl-newsPost bl-newsPost--thumbnail">
                            <figure class="post_img">
                                <a href="{{route('category.news.show',[$news->category_slug,$news->c_id])}}">
                                    <img src="{{$news->image}}"
                                         alt="{!! $news->title !!}"/>
                                </a>
                            </figure>
                            <div class="post_content">
                                <h5 class="post_title">
                                    <a href="{{route('category.news.show',[$news->category_slug,$news->c_id])}}">
                                        {!! $news->title !!}
                                    </a>
                                </h5>
                                <p>{!! \Illuminate\Support\Str::limit($news->short_description,50) !!}</p>
                                <p class="post_source">
                                    {{$news->guest ?? $news->reporter_name}}
                                    {{$news->date_line ? '-' .$news->date_line  :''}}
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    </div>
</section>
