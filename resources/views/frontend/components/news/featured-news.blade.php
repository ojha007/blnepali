@isset($breakingNews)

@php($breakFirst = $breakingNews->first())

    <div class="text-only-news text-center">
        <a href="../breaknlinks/news-detail.html">
            <h1>
                {!! $breakFirst->title !!}
            </h1>
        </a>
    </div>
            @foreach($breakingNews->skip(1)->take(2) as $key => $news)
            <div style="background: url('{{ $news->image }}'); background-repeat: no-repeat; height: 600px; background-size: cover; border-radius: 10px;" class="container banner position-relative text-center my-5 py-4">
                <a href="{{ route('news.show', ['id' => $news->id]) }}" class="a-hover">
                    <div class="text-center mb-4 fw-bolder position-absolute text-white fs-1 shadow-sm bg-gradient-primary px-4 py-2 fw-bolder rounded-2" style="left: 0; bottom: -25px; right: 0;">
                        <h4 class="text-white a-hover mt-5 py-5 text-center fs-1 fw-bold">
                            <svg style="width: 35px; height: 30px;" class="me-2" viewBox="0 0 16 16" version="1.1" aria-hidden="true">
                                <title>blinking-dot</title>
                                <g>
                                    <circle cx="8" cy="8" r="7.16" stroke="#c31833" stroke-width="1.68" fill="#ffffff"></circle>
                                    <circle cx="8" cy="8" r="4" fill="#c31833">
                                        <animate attributeName="opacity" values="1;1;1;1;0;1" dur="2.5s" repeatCount="indefinite"></animate>
                                    </circle>
                                </g>
                            </svg>
                            {!! $news->title !!}
                        </h4>
                    </div>
                </a>
            </div>
            @endforeach
            
</section>
@endisset
