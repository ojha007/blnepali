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
    @foreach($bannerNews->skip(1)->take(1) as $key => $bNews)
        <div class="row">
            <div class="col-md-5">
                <a href="{{ route('category.news.show', [$bNews->category_slug,$bNews->c_id]) }}" class="a-hover">

                    <div class="text-left fw-bolder fs-1 text-black fw-bolder rounded-2">

                        @if($bNews->slug)
                            <h4 class="featured-title">
                                {{$bNews->slug}}
                            </h4>
                        @endif
                        <h4 class="a-hover text-left fs-1 fw-bold">
                            {{$bNews->title}}
                        </h4>
                        <div class="feature-news my-2">
                            <p>
                                {{\Illuminate\Support\Str::limit($bNews->short_description, 500)}}
                            </p>
                            <p class="text-muted fs-6 fw-bold text-info">
                                {{$bNews->reporter_name ?? ''}}
                            </p>
                        </div>

                    </div>
                </a>
            </div>
            <div class="col-md-7">
                <div
                        style="background: url('{{ $bNews->image }}'); background-repeat: no-repeat; height: 340px;background-position:top; background-size: cover; border-radius: 10px;"
                        class="container banner position-relative text-center my-5 py-4">

                </div>
            </div>
        </div>
    @endforeach
@endisset
