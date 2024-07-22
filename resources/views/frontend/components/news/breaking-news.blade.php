@isset($breakingNews)
    <div class="col-md-12 mb-4">
        <a href="{{route('newsByCategory',$breakingNews->first()->category_slug)}}"
           class="a-hover">
        <h5 class="header-title">ब्रेक</h5>
        </a>
    </div>

    @php($breakFirst = $breakingNews->skip(2)->first())

    @if($breakFirst)
        <div class="border-bottom border-2 pb-2">
            <figure class="position-relative">
                <img src="{{$breakFirst->image}}"
                     alt="{{$breakFirst->title}}">
            </figure>
            <a href="{{ route('showDetail', ['c_id' => $breakFirst->c_id]) }}" class="a-hover">
                <h1 class="small-title py-1">
                    {!! $breakFirst->title !!}
                </h1>
            </a>
        </div>
        <ul class="list-style list-group mt-3">
            @foreach($breakingNews->skip(1) as $key=>$news)
                <li class="m-0 my-2">
                    <a class="d-flex align-items-center a-hover" href="{{ route('showDetail', ['c_id' => $news->c_id]) }}">
               <span class="breklink-badge">
               {{ __('messages.'.$loop->iteration ) }}
               </span>
                        <h2 class="samaj-title a-hover">
                            {!! $news->title !!}
                        </h2>
                    </a>
                    <span class="ms-5 ps-2 souce fw-bold text-muted">
              {!! $news->date_line !!}
            </span>
                </li>
            @endforeach
        </ul>
    @endif

@endisset
