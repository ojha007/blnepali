@php use Illuminate\Support\Str; @endphp

@isset($blSpecialNews)

        <div class="container">
            <div class="col-md-12 mb-4">
                <h5 class="header-title text-white">बिएल विशेष</h5>
            </div>
            <div class="row">
                @foreach($blSpecialNews as $news)
                    <div class="col-md-3 a-hover">
                        <div class="black-box">
                            <figure class="position-relative">
                                <img src="{{getResizeImage($news->image)}}"
                                     alt="{{$news->title}}">
                            </figure>
                            <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}"
                               class="a-hover">
                                <h1 class="small-title p-3 text-white">
                                    {!! Str::limit($news->title) !!}
                                </h1>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endisset
