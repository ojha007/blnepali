@isset($order4News)
    @php($order4First = $order4News->first())

    @if($order4First)
        <h5 class="header-title pb-3">
            {{$order4First->category->name}}
        </h5>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center position-relative">
                    <a href="{{route('category.news.show',['category'=>$order4First->category->slug,'c_id'=>$order4First->c_id])}}"
                       class="card  border-0 ">
                        <img src="{{getResizeImage($order4First->image,'fits-in/350x300')}}"
                             class="card-img"
                             alt="{{$order4First->title }} -- {{config('app.name')}}"/>
                        <div class="card-img-overlay bg-gradient-primary top-50 p-3 mt-5 text-white bottom-0">
                            <div
                                class="d-flex align-items-center justify-content-center gap-3">
                                <h2 class="card-title fw-bold fs-3 text-center">
                                    {!! $order4First->title !!}
                                </h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="row mt-3">
                    @foreach($order4News->skip(1) as $key=>$news)
                        <div class="col-md-6">
                            <div class="d-flex align-items-center border-bottom mb-3">
                                <figure
                                    class="post_img">
                                    <a href="{{route('category.news.show',['category'=>$news->category->slug,'c_id'=>$news->c_id])}}">
                                        <img src="{{getResizeImage($news->image,'fits-in/100x80')}}"
                                             class="card-img"
                                             alt="{{$news->title }} -- {{config('app.name')}}"/>
                                    </a>
                                </figure>
                                <div class="ps-3">
                                    <h5 class="fw-bold medium-title fs-5">
                                        <a href="{{route('category.news.show',['category'=>$news->category->slug,'c_id'=>$news->c_id])}}">
                                            {!! $news->title !!}
                                        </a>
                                    </h5>
                                    <p class="text-muted fw-bold">
                                        {{$news->guest ?? $news->reporter->name ?? '' }}
                                        {{$news->date_line ? '-' .$news->date_line  :''}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endisset
