<div class="bl-newsHeader">
    <h5 class="header-title">
        @if(!$order6News->isEmpty())
            {{$order6News->first()->category->name}}
        @endif
    </h5>
</div>

<div class="bl-news bl-news--smallThumbs">
    <!--repeatable items-->
    @foreach($order6News as $news)
        <div class="bl-news bl-news--smallThumbs">
            <!--repeatable items-->
            <div class="bl-newsPost bl-newsPost--small">
                <figure class="post_img">

                    <a href="{{route('category.news.show',['category'=>$news->category_slug,'c_id'=>$news->c_id])}}">
                        <img src="{{getResizeImage($news->image)}}"
                             alt="{{$news->image_alt ?? $news->image_description ?? ''}}"/>
                    </a>
                </figure>
                <div class="post_content">
                    <h5 class="post_title">
                        <a href="{{route('category.news.show',['category'=>$news->category_slug,'c_id'=>$news->c_id])}}">
                            {{$news->title??''}}
                        </a>
                    </h5>
                    <p class="post_source">
                        {{$news->guest ?? $news->reporter->name ?? '' }}
                        {{$news->date_line ? '-' .$news->date_line  :''}}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
