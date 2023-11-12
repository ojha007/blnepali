@php($order1First = $order1News->first())

@if($order1First)
    <div class="col-md-12 mb-4">
        <h5 class="header-title">{{$order1First->category_name}}</h5>
    </div>

    <div class="row g-0">
        <div class="col-md-7">
            <figure class="position-relative">
                <img src="{{$order1First->image}}"
                     alt="{{$order1First->title}}">
                <figcaption>{!! $order1First->date_line !!}</figcaption>
            </figure>
        </div>
        <div class="col-md-5">
            <a href="{{route('category.news.show',[$order1First->category_slug,$order1First->c_id])}}" class="a-hover">
                <h1 class="small-title px-3">
                    {!! $order1First->title !!}
                </h1>
                <p class="post-description-sm p-3">
                    {!! $order1First->sub_title !!}
                </p>
            </a>
        </div>
    </div>

    <div class="row rajniti-second-row mt-4">
        @foreach($order1News->skip(1) as $news)
            <div class="col-md-4">
                <div>
                    <figure class="position-relative mb-3">
                        <img src="{{$news->image}}"
                             alt="{{$news->title}}">
                    </figure>
                    <a href="{{route('category.news.show',[$news->category_slug,$news->c_id])}}" class="a-hover">
                        <h1 class="small-title py-1">
                            {!! $news->title !!}
                        </h1>
                    </a>
                    <span class="text-muted fs-6 fw-bold text-info">{!! $news->date_line !!}</span>
                </div>
            </div>
        @endforeach
    </div>

@endif
