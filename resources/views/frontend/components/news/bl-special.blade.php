@isset($blSpecialNews)
    <div class="container">
        <div class="col-md-12 mb-4">
            <a href="{{route('newsByCategory','bl-special')}}"
               class="a-hover">
                <h5 class="header-title text-white">बिएल विशेष</h5>
            </a>
        </div>
        <div class="row">
            @foreach($blSpecialNews as $news)
                <div class="col-md-3 a-hover">
                    <div class="black-box">
                        <a href="{{route('category.news.show', [$news->category_slug, $news->c_id]) }}"
                           class="a-hover">
                            <figure class="position-relative">
                                <img src="{{$news->image}}"
                                     alt="{{$news->title}}">
                            </figure>
                            <h1 class="small-title p-3 text-white">
                                {!! $news->title !!}
                            </h1>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endisset
