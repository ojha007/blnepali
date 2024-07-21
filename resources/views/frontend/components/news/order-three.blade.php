@isset($order3News)
    <div class="col-md-12">
        <h5 class="header-title mb-4">

            @if(!$order3News->isEmpty())
            <a href="{{route('newsByCategory','opinion')}}">
                विचार
            </a>
            @endif
        </h5>
    </div>
    @foreach($order3News as $news)
        <div class="{{!$loop->last ?'border-bottom mb-3' : ''}} ">
            <figure class="post_img">
                <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}">
                    <img src="{{getResizeImage($news->image)}}"
                         alt="{{$news->image_alt ?? $news->image_description ?? ''}}"/>
                </a>
            </figure>
            <div>
                <h5 class="fw-bold medium-title fs-5">
                    <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}">
                        {!! $news->title !!}
                    </a>
                </h5>
                <p class="text-muted fw-bold">
                    {{$news->guest ?? $news->reporter_name ?? '' }}
                </p>

                {{print_r($news)}}
            </div>
        </div>
    @endforeach
@endisset


