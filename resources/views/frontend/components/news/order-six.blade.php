<div class="bl-newsHeader">
    <h5 class="header-title">{{$order6News->first()->category ??'विचार/विश्लेषण'}}</h5>
</div>
<div class="bl-news bl-news--smallThumbs">
    <!--repeatable items-->
    @foreach($order6News as $news)
        <div class="bl-news bl-news--smallThumbs">
            <!--repeatable items-->
            <div class="bl-newsPost bl-newsPost--small">
                <figure class="post_img">

                    <a href="{{route('category.news.show',['category'=>$news->category_slug,'c_id'=>$news->c_id])}}">
                        <img src="{{$news->image}}"
                             alt="{{$news->title??''}}"/>
                    </a>
                </figure>
                <div class="post_content">
                    <h5 class="post_title">
                        <a href="{{route('category.news.show',['category'=>$news->category_slug,'c_id'=>$news->c_id])}}">
                            {{$news->title??''}}</a></h5>
                    <p class="post_source">
                        {{$news->reporter ?? $news->guest}}
                        {{$news->date_line ? '-' .$news->date_line  :''}}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
