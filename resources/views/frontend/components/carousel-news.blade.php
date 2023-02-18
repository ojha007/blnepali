@if(count($breakingNews))
    <section class="container-fluid container-xxl">
        <div class="row">
            <div class="bl-news bl-news--hotScrolling">
                <div class="owl-carousel owl-theme" id="bl-hotScrolling">
                    <!--repeatable items-->
                    @foreach($breakingNews as $news)
                        <div class="item">
                            <div class="bl-newsPost bl-newsPost--small">

                                <figure class="post_img">
                                    <a href="{{route('category.news.show',[$news->category_slug,'c_id'=>$news->c_id])}}">
                                        <img src="{{$news->image}}"
                                             alt="{!! $news->title !!}"/>
                                    </a>
                                </figure>
                                <div class="post_content">
                                    <h5 class="post_title">
                                        <a href="{{route('category.news.show',[$news->category_slug,'c_id'=>$news->c_id])}}">
                                            {!! $news->title !!}
                                        </a>
                                    </h5>
                                    <p>{{\Illuminate\Support\Str::limit($news->short_description, 50)}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!--ended repeatable items-->
                </div>
            </div>
        </div>
    </section>
@endif
