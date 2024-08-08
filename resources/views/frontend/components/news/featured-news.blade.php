@isset($bannerNews)
    @php($bFirst = $bannerNews->where('image_visible',false)->first())

    @if($bFirst)
        <div class="text-only-news text-center">
            <a href="{{ route('category.news.show', [ $bFirst->category_slug,$bFirst->c_id]) }}">
                <h1>
                    {!! $bFirst->title !!}
                </h1>
            </a>
        </div>
    @endif

    <div class="row">
        <div id="featuredNews" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach($bannerNews->skip(1) as $key => $bNews)
                    <div class="carousel-item active">
                        <img src="{{$bNews->image}}" class="d-block w-100" alt="{{$bNews->image_alt ?? "Breaknlinks"}}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{!! $bNews->title  !!}</h5>
                            <p>{!!  $bNews->short_description !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    {{--    @foreach($bannerNews->skip(1) as $key => $bNews)--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-md-5">--}}
    {{--                <a href="{{ route('category.news.show', [$bNews->category_slug,$bNews->c_id]) }}" class="a-hover">--}}
    {{--                    <div class="text-left fw-bolder fs-1 text-black fw-bolder rounded-2">--}}
    {{--                        @if($bNews->slug)--}}
    {{--                            <h4 class="featured-title">--}}
    {{--                                {{$bNews->slug}}--}}
    {{--                            </h4>--}}
    {{--                        @endif--}}
    {{--                        <h4 class="a-hover text-left fs-1 fw-bold">--}}
    {{--                            {!! $bNews->title  !!}--}}
    {{--                            <div class="feature-news my-2">--}}
    {{--                                <p>--}}
    {{--                                    {!!  $bNews->short_description !!}--}}
    {{--                                </p>--}}
    {{--                                <p class="text-muted fs-6 fw-bold text-info">--}}
    {{--                                    {{$bNews->reporter_name ?? ''}}--}}
    {{--                                </p>--}}
    {{--                            </div>--}}
    {{--                        </h4>--}}
    {{--                    </div>--}}
    {{--                </a>--}}
    {{--            </div>--}}
    {{--            <div class="col-md-7">--}}
    {{--                <div--}}
    {{--                    style="background: url('{{ $bNews->image }}'); background-repeat: no-repeat; height: 340px;background-position:top; background-size: cover; border-radius: 10px;"--}}
    {{--                    class="container banner position-relative text-center my-5 py-4">--}}

    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    @endforeach--}}
@endisset
@push('scripts')
    <script>
        let featuredNews = document.querySelector('#featuredNews')
        new bootstrap.Carousel(featuredNews, {
            interval: 2000,
            wrap: false
        })
    </script>
@endpush
