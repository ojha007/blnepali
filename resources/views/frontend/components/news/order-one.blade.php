@isset($order1News)
    @php($order1First = $order1News->first())

    @if($order1First)
        <div class="col-md-12 mb-4">
            <a href="{{route('newsByCategory',$order1First->category_slug)}}"
               class="a-hover">
            <h5 class="header-title">{{$order1First->category_name}}</h5>
            </a>
        </div>
        <div class="row g-0">
            <div class="col-md-7">
                <figure class="position-relative">
                    <img src="{{getResizeImage($order1First->image)}}"
                         alt="{{$order1First->image_alt ?? $order1First->image_description ?? ''}}"/>

                </figure>
            </div>
            <div class="col-md-5">
                <a href="{{ route('showDetail', ['c_id' => $order1First->c_id]) }}"
                   class="a-hover">
                    <h1 class="small-title px-3">
                        {!! $order1First->title !!}
                    </h1>
                    <p class="post-description-sm p-3">
                        {!! $order1First->sub_title !!}
                        {!! $order1First->short_description !!}

                    </p>
                </a>
            </div>
        </div>

        <div class="row mt-4">
            @foreach($order1News->skip(1) as $news)
                <div class="col-md-4">
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
    @endif

@endisset
