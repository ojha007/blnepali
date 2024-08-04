@isset($brandStory)
    <div class="col-md-8">
        <h5 class="header-title">ब्राण्ड स्टोरी</h5>
        <div class="row">
            @foreach($brandStory as $news)
                <div class="col-md-4">
                    <div class="pb-2">
                        <a href="{{ route('category.news.show', [$news->category_slug, $news->c_id]) }}">
                            <figure class="position-relative">
                                <img src="{{ $news->image }}" alt="">
                            </figure>
                            <h1 class="small-title py-1">
                                {!! $news->title !!}
                            </h1>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endisset
