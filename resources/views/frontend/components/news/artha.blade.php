@if($artha?->isNotEmpty())
    @php($arthaFirst = $artha->first())
    <div class="col-md-4">
        <a href="{{route('newsByCategory',$arthaFirst->category_slug)}}">
            <h5 class="header-title">अर्थ</h5>
        </a>
        @if($arthaFirst)
            <div class="border-bottom border-2 pb-2">
                <figure class="position-relative">
                    <img src="{{ $arthaFirst->image }}" alt="{{ $arthaFirst->image_alt }}">
                </figure>
                <a href="{{ route('category.news.show', [$arthaFirst->category_slug, $arthaFirst->c_id]) }}">
                    <h1 class="small-title py-1">
                        {!! $arthaFirst->title !!}
                    </h1>
                </a>
            </div>
        @endif
        <ul class="list-style list-group mt-3">
            @foreach($artha->skip(1) as $news)
                <li class="m-0 my-2">
                    <a class="d-flex align-items-center"
                       href="{{ route('category.news.show', [$news->category_slug, $news->c_id]) }}">
                        <h2 class="samaj-title">
                            {{ $news->title }}
                        </h2>
                    </a>
                    <span class="source fw-bold text-muted">
                    {{ $news->reporter_name }} - {{ $news->date_line }}
                </span>
                </li>
            @endforeach

            <!-- Add more list items for additional news items if needed -->
        </ul>
    </div>
@endif
