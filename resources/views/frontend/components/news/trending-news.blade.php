<div class="bl-news bl-news--trending">
    <div class="post-widgetHeader">
        <h4>Trending</h4>
    </div>
    <div class="post-widgetBody">
        <div class="trendingNews">
            @foreach($trendingNews as $news)
                <div class="trendingNews-item">
                    <h5 class="post_title">
                        <a href="#">{{$news->title}}</a>
                    </h5>
                    <span class="post_source">
                         @if($news->guest)
                            {{$news->guest}}
                        @elseif($news->reporter)
                            {{$news->reporter->name}}
                        @endif
                        {{$news->date_line ? '-' .$news->date_line  :''}}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
</div>
