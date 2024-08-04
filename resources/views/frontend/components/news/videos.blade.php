@if($videoNews?->isNotEmpty())
    <div class="container py-3">
        <div class="row g-2">
            <div class="col-md-12">
                <a href="{{route('newsByCategory','video')}}">
                    <h5 class="header-title pb-3 text-white">
                        भिडियोK
                    </h5>
                </a>
            </div>
            @foreach($videoNews->take(1) as $key => $news)
                <div class="col-md-5">
                    <a href="{{ route('category.news.show', [$news->category_slug, $news->c_id]) }}"
                       class="card h-100 border-0 ">
                        <img class="card-img h-100"
                             src="{{ getResizeImage($news->image) }}"
                             alt="{{ $news->image_alt }}"/>

                        <div class="card-img-overlay bg-gradient-primary top-50 p-3 mt-5 text-white bottom-0">
                            <div class="d-flex align-items-center gap-3 overlay-postition-bttom">
                                @include('frontend.icons.video-icon')
                                <h2 class="card-title fw-bold fs-3">
                                    {!! $news->title !!}
                                </h2>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-md-7">
                <div class="row g-2">
                    @foreach($videoNews->skip(1) as $key => $news)
                        <div class="col-md-6">
                            <a href="{{ route('category.news.show', [$news->category_slug, $news->c_id]) }}"
                               class="card h-100 border-0">
                                <img class="card-img"
                                     src="{{ $news->image }}"
                                     alt="{{ $news->image_alt }}"/>
                                <div class="card-img-overlay bg-gradient-primary text-white bottom-0">
                                    <div class="d-flex overlay-postition-bttom align-items-center gap-3">
                                        <svg
                                            style="background-color: #f06023;width: 60px;padding: 10px;border-radius: 4px;"
                                            xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white"
                                            class="bi bi-play-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                            <path
                                                d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445z"/>
                                        </svg>
                                        <h2 class="card-title fw-bold fs-5">
                                            {{\Illuminate\Support\Str::limit($news->title, 50)}}
                                        </h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
