@isset($order5News)
    <div class="col-md-12">
        <a href="{{route('newsByCategory','blogs')}}">
            <h5 class="header-title pb-3">
                ब्लग
            </h5>
        </a>
    </div>
    @foreach($order5News as $key=> $news)
        <div class="border p-3 rounded-1">
            <h3 class="medium-title">
                <a href="{{ route('category.news.show', [$news->category_slug, $news->c_id]) }}"
                   class="fw-bold fs-5">
                    {!! $news->title !!}
                </a>
            </h3>
            <div class="">
                <a href="{{ route('category.news.show', [$news->category_slug, $news->c_id]) }}">
                    <img class="border p-2 rounded-circle" style="height: 100px;width: 100px;"
                         src="{{getResizeImage($news->image)}}"
                         alt="{{$news->image_alt }}}}"/>
                </a>
                <span class="writer">
                    @include('frontend.icons.writer-icon')
                    <span class="text-muted fw-bold me-4">
                        {{ $news->guest_name ?? $news->reporter_name ?? '' }}
                    </span>
                 </span>
            </div>
        </div>
    @endforeach
@endisset
