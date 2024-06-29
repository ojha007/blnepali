@isset($order2News)
    <div class="col-md-12">
        <h5 class="header-title mb-4">
            @if(!$order2News->isEmpty())
                {{$order2News->first()->category_name}}
            @endif
        </h5>
    </div>

    @foreach($order2News as $key => $news)
        <div class="media d-flex mb-4 gap-4 align-items-center">
            <a class="d-block w-100" href="{{ route('showDetail', ['c_id' => $news->c_id]) }}">
                <img src="{{getResizeImage($news->image)}}"
                     class="img-fluid"
                     alt="{{$news->image_alt ?? $news->image_description ?? ''}}"/>
            </a>
            <div class="media-body">
                <h3 class="fw-bold medium-title fs-5">
                    <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}">
                        {!! $news->title !!}
                    </a>
                </h3>
                <p class="post-description-sm d-none d-md-none d-lg-block">
                    {!! \Illuminate\Support\Str::limit($news->short_description) !!}
                </p>
                <h5
                        class="text-muted source fs-6 fw-bold text-info"
                >
                    {{$news->guest ?? $news->reporter_name ?? '' }}
                    {{$news->date_line ? '-' .$news->date_line  :''}}
                </h5>
            </div>
        </div>
    @endforeach
@endisset


