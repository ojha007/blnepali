<div class="bl-newsHeader">
    <h5 class="header-title">
        @if(!$order2News->isEmpty())
            {{$order2News->first()->category->name}}
        @endif
    </h5>
</div>
<div class="bl-news bl-news--generalNews">
    @foreach($order2News as $key=> $news)
        @if($key == 0)
            <div class="bl-newsPost bl-newsPost--highlightNews">
                <figure class="post_img">

                    <a href="{{route('category.news.show',['category'=>$news->category->slug,'c_id'=>$news->c_id])}}">
                        <img src="{{$news->image}}"
                             alt="{{$news->title??''}} -- {{config('app.name')}}"/>
                    </a>
                </figure>
                <div class="post_content">
                    <h5 class="post_title">
                        <a href="{{route('category.news.show',['category'=>$news->category->slug,'c_id'=>$news->c_id])}}">
                            {{$news->title}}
                        </a>
                    </h5>
                    <p>{!! \Illuminate\Support\Str::limit($news->short_description) !!}</p>
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
        @else
            <div class="bl-newsPost bl-newsPost--thumbnail">
                <figure class="post_img">

                    <a href="{{route('category.news.show',['category'=>$news->category->slug,'c_id'=>$news->c_id])}}">
                        <img src="{{$news->image}}"
                             alt="{{$news->title}} -- {{config('app.name')}}"/>
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
        @endif
    @endforeach
</div>
