<div class="bl-newsHeader">
    <h5 class="header-title">
        @if(!$order3News->isEmpty())
            {{$order3News->first()->category->name}}
        @endif
    </h5>
</div>

@foreach($order3News as $news)
    <div class="bl-news bl-news--smallThumbs">
        <!--repeatable items-->
        <div class="bl-newsPost bl-newsPost--small">
            <figure class="post_img">

                <a href="{{route('category.news.show',['category'=>$news->category->slug,'c_id'=>$news->c_id])}}">
                    <img src="{{$news->image}}"
                         alt="{{($news)->title}}"/>
                </a>
            </figure>
            <div class="post_content">
                <h5 class="post_title">
                    <a href="{{route('category.news.show',['category'=>$news->category->slug,'c_id'=>$news->c_id])}}">
                        {{$news->title}}
                    </a>
                </h5>
                <p class="post_source">
                    @if($news->guest)
                        {{$news->guest}}
                    @elseif($news->reporter)
                        {{$news->reporter->name}}
                    @endif
                    {{$news->date_line ? '-' .$news->date_line  :''}}
                </p>
            </div>
        </div>
    </div>
@endforeach
