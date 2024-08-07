<div class="container py-3">
    <div class="row g-2">
        <div class="col-md-12">
            <h5 class="header-title pb-3">
                <a href="{{route('newsByCategory','tourism')}}">घुमफिर</a>
            </h5>
        </div>

        <div class="col-md-8">
            @if($ghumphir->isNotEmpty())
                @php $mainNews = $ghumphir->first(); @endphp
                <a href="{{ route('category.news.show', [$mainNews->category_slug, $mainNews->c_id]) }}"
                   class="card a-hover h-100 border-0">
                    <img class="card-img h-100" src="{{ getResizeImage($mainNews->image) }}"
                         alt="{{ $mainNews->image_alt }}">
                    <div class="card-img-overlay bg-gradient-primary top-50 p-3 mt-5 text-white bottom-0">
                        <h2 class="card-title fw-bold fs-3">
                            {!! $mainNews->title !!}
                        </h2>
                    </div>
                </a>
            @endif
        </div>

        <div class="col-md-4">
            <div class="row g-2 h-100 ghumphir-side">
                @foreach($ghumphir->skip(1) as $news)
                    <div class="col-md-12 h-50">
                        <a href="{{ route('showDetail', [$news->category_slug, $news->c_id]) }}"
                           class="card d-block h-100 border-0">
                            <img class="card-img" src="{{ $news->image }}" alt="{{ $news->image_alt }}">
                            <div class="card-img-overlay bg-gradient-primary text-white bottom-0">
                                <h2 class="card-title fw-bold fs-4">
                                    {!! $news->title !!}
                                </h2>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
