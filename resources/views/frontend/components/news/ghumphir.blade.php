<div class="container py-3">
    <div class="row g-2">
        <div class="col-md-12">
            <h5 class="header-title pb-3">
                <a href="{{route('newsByCategory','tourism')}}">घुमफिर</a>
            </h5>
        </div>

        {{-- Main News Section (col-md-8) --}}
        <div class="col-md-8">
            @if($ghumphir->isNotEmpty())
                @php $mainNews = $ghumphir->shift(); @endphp
                <a href="{{ route('category.news.show', ['category' => $mainNews->category_slug, 'c_id' => $mainNews->c_id]) }}" class="card a-hover h-100 border-0">
                    <img class="card-img" src="{{ $mainNews->image }}" alt="{{ $mainNews->image_alt }}">
                    <div class="card-img-overlay bg-gradient-primary top-50 p-3 mt-5 text-white bottom-0">
                        <h2 class="card-title fw-bold fs-3 overlay-postition-bttom">
                            {{ $mainNews->title }}
                        </h2>
                    </div>
                </a>
            @endif
        </div>

        {{-- Side News Section (col-md-4) --}}
        <div class="col-md-4">
            <div class="row g-2 h-100 ghumphir-side">
                @foreach($ghumphir->take(2) as $news)
                <div class="col-md-12">
                    <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}" class="card border-0">
                        <img class="card-img" src="{{ $news->image }}" alt="{{ $news->image_alt }}">
                        <div class="card-img-overlay bg-gradient-primary overlaypostition text-white bottom-0">
                            <h2 class="card-title fw-bold fs-4 overlay-postition-bttom">
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
