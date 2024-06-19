@isset($sahitya)
<div class="col-md-4">
    <h5 class="header-title">साहित्य</h5>

    {{-- Loop through each $news item --}}
    @foreach($sahitya as $key => $news)
        @if($key === 0)
            {{-- Display first item --}}
            <div class="border-bottom border-2 pb-2">
                <figure class="position-relative">
                    <img src="{{ getResizeImage($news->image) }}" alt="{{ $news->image_alt }}">
                </figure>
                <a href="{{ route('category.news.show', ['category' => $news->category_slug, 'c_id' => $news->c_id]) }}">
                    <h1 class="small-title py-1">
                        {{ $news->title }}
                    </h1>
                </a>
            </div>
        @else
            {{-- Display remaining items --}}
            <ul class="list-style list-group mt-3">
                <li class="m-0 my-2">
                    <a class="d-flex align-items-center" href="{{ route('category.news.show', ['category' => $news->category_slug, 'c_id' => $news->c_id]) }}">
                        <h2 class="samaj-title">
                            {{ $news->title }}
                        </h2>
                    </a>
                    <span class="source fw-bold text-muted">
                        {{ $news->guest ?? ($news->reporter->name ?? '') }}
                    </span>
                </li>
            </ul>
        @endif
    @endforeach
</div>
@endisset
