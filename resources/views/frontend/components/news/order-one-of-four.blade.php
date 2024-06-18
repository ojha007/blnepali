@isset($order1Of4News)
<div class="row">
    @foreach($order1Of4News as $news)
    <div class="col-md-4">
        <h5 class="header-title">{{ $news->category_name }}</h5>
        <div class="border-bottom border-2 pb-2">
            <figure class="position-relative">
                <img src="{{ $news->image }}" alt="{{ $news->image_alt }}">
            </figure>
            <a href="{{route('category.news.show',['category'=>$news->category_slug,'c_id'=>$news->c_id])}}">
                <h1 class="small-title py-1">
                    {{!! $news->title !!}}
                </h1>
            </a>
        </div>
        <ul class="list-style list-group mt-3">
            <li class="m-0 my-2">
                <a class="d-flex align-items-center" href="{{route('category.news.show',['category'=>$news->category_slug,'c_id'=>$news->c_id])}}">
                    <h2 class="samaj-title">
                        {{ $news->sub_title }}
                    </h2>
                </a>
                <span class="source fw-bold text-muted">
                    {{ $news->reporter_name }} - {{ $news->date_line }}
                </span>
            </li>
            <!-- Add more list items for additional news items if needed -->
        </ul>
    </div>
    @endforeach
</div>
@endisset
