@isset($sahitya)
    <a href="{{route('newsByCategory','literature')}}">
        <h5 class="header-title">साहित्य</h5>
    </a>
    <div class="row mt-4 mb-4">
        @foreach($sahitya as $news)
            <div class="col-md-3">
                <div>
                    <figure class="position-relative mb-3">
                        <img src="{{getResizeImage($news->image)}}"
                             alt="{{$news->image_alt ?? $news->image_description ?? ''}}"/>

                    </figure>
                    <a href="{{route('category.news.show', [$news->category_slug, $news->c_id]) }}" class="a-hover">
                        <h1 class="small-title py-1">
                            {!! $news->title !!}
                        </h1>
                    </a>
                    <span class="text-muted fs-6 fw-bold text-info">{!! $news->reporter_name !!}</span>
                </div>
            </div>
        @endforeach
    </div>
@endisset
