@isset($sahitya)
<h5 class="header-title">साहित्य</h5>

    <div class="row mt-4 mb-4">
        @foreach($sahitya as $news)
            <div class="col-md-3">
                <div>
                    <figure class="position-relative mb-3">
                        <img src="{{getResizeImage($news->image)}}"
                             alt="{{$news->image_alt ?? $news->image_description ?? ''}}"/>

                    </figure>
                    <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}" class="a-hover">
                        <h1 class="small-title py-1">
                            {!! $news->title !!}
                        </h1>
                    </a>
                    <span class="text-muted fs-6 fw-bold text-info">{!! $news->reporter_name !!}</span>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Loop through each $news item
    @foreach($sahitya as $key => $news)
        @if($key === 0)
            
            <div class="border-bottom border-2 pb-2">
                <figure class="position-relative">
                    <img src="{{ getResizeImage($news->image) }}" alt="{{ $news->image_alt }}">
                </figure>
                <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}">
                    <h1 class="small-title py-1">
                        {{ $news->title }}
                    </h1>
                </a>
            </div>
        @else
           
            <ul class="list-style list-group mt-3">
                <li class="m-0 my-2">
                    <a class="d-flex align-items-center" href="{{ route('showDetail', ['c_id' => $news->c_id]) }}">
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
    @endforeach --}}
@endisset
