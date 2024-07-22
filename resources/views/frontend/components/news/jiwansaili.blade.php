@isset($jiwansaili)
    @php($jiwansailiFirst = $jiwansaili->first())
    <div class="col-md-4">
        <a href="{{route('newsByCategory','lifestyle')}}">
        <h5 class="header-title">जीवनशैली</h5>
        </a>
        @if($jiwansailiFirst)
        <div class="border-bottom border-2 pb-2">
            <figure class="position-relative">
                <img src="{{ $jiwansailiFirst->image }}" alt="{{ $jiwansailiFirst->image_alt }}">
            </figure>
            <a href="{{ route('showDetail', ['c_id' => $jiwansailiFirst->c_id]) }}">
                <h1 class="small-title py-1">
                    {!! $jiwansailiFirst->title !!}
                </h1>
            </a>
        </div>
        @endif
        <ul class="list-style list-group mt-3">
            @foreach($jiwansaili->skip(1) as $news)
            <li class="m-0 my-2">
                <a class="d-flex align-items-center" href="{{ route('showDetail', ['c_id' => $news->c_id]) }}">
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
@endisset