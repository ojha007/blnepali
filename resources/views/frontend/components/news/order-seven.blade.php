<div class="bl-newsHeader">
    <h5 class="header-title">{{$order7News->first()->category??'Seventh CateGoryNews'}}</h5>
</div>

<div class="bl-news bl-news--twoColumner">
    <!--repeatable item with condition-->
    @foreach($order7News as $key=>$news)
        @if($key == 0)
            <div class="bl-newsPost bl-newsPost--highlightNews">
                <figure class="post_img">
                    <a href="{{route('category.news.show',['category'=>$news->category_slug,'c_id'=>$news->c_id])}}">
                        <img src="{{$news->image}}"
                             alt="{{($news)->title??''}} -- {{config('app.name')}}"/>
                    </a>
                </figure>
                <div class="post_content">
                    <h5 class="post_title">

                        <a href="{{route('category.news.show',['category'=>$news->category_slug,'c_id'=>$news->c_id])}}">
                            {{$news->title??''}}
                        </a>
                    </h5>
                    <p>{!! Str::limit($news->description ??'',600) !!} </p>
                    <p class="post_source">
                        {{$news->reporter ?? $news->guest}}
                        {{$news->date_line ? '-' .$news->date_line  :''}}
                    </p>
                </div>
            </div>
        @else
            <div class="bl-newsPost bl-newsPost--thumbnail">
                <figure class="post_img">

                    <a href="{{route('category.news.show',['category'=>$news->category_slug,'c_id'=>$news->c_id])}}">
                        <img src="{{$news->image}}"
                             alt="{{($news)->title??''}} -- {{config('app.name')}}"/>
                    </a>
                </figure>
                <div class="post_content">
                    <h5 class="post_title">
                        <a href="{{route('category.news.show',['category'=>$news->category_slug,'c_id'=>$news->c_id])}}">
                            {{$news->title}}</a>
                    </h5>
                    <p class="post_source">
                        {{$news->reporter ?? $news->guest}}
                        {{$news->date_line ? '-' .$news->date_line  :''}}
                    </p>
                </div>
            </div>
        @endif
    @endforeach

</div>
