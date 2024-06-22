@isset($order5News)
    <div class="col-md-12">
        <h5 class="header-title pb-3">
          @if(!$order5News->isEmpty())
                {{$order5News->first()->category_name}}
            @endif
        </h5>
    </div>
    @foreach($order5News as $key=> $news)
        {{-- <div class="border p-3 rounded-1">
            <h3 class="medium-title">
                <a href="{{route('category.news.show',['category'=>$news->category_slug,'c_id'=>$news->c_id])}}"
                   class="fw-bold fs-5">
                    {!! $news->title !!}
                </a>

            </h3>
            <div class="">
                <a href="{{route('category.news.show',['category'=>$news->category_slug,'c_id'=>$news->c_id])}}">
                    <img src="{{getResizeImage($news->image)}}"
                         alt="{{$news->title }} -- {{config('app.name')}}"/>
                </a>
                @include('frontend.icons.writer-icon')

                <span class="text-muted fw-bold me-4">
                        {{$news->guest ?? $news->reporter->name ?? '' }}
                    {{$news->date_line ? '-' .$news->date_line  :''}}
                  </span>
            </div>
        </div> --}}
        <div class="border p-3 rounded-1">
            <h3 class="medium-title">
                <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}"
                    class="fw-bold fs-5">
                     {!! $news->title !!}
                 </a>
            </h3>
            <div class="">
            <a href="">
            </a>
            <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}"> 
            
            <img class="border p-2 rounded-circle" style="height: 100px;width: 100px;"  src="{{getResizeImage($news->image)}}"
            alt="{{$news->title }} -- {{config('app.name')}}"/>    
        </a> 
            <span class="writer">
                @include('frontend.icons.writer-icon')
            <span class="text-muted fw-bold me-4">
                {{$news->guest ?? $news->reporter->name ?? '' }}
                {{$news->date_line ? '-' .$news->date_line  :''}}
            </span>
            </span>
            
            </div>
            </div>
    @endforeach
@endisset
