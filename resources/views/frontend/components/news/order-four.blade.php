@isset($order4News)
    @php($order4First = $order4News->first())

    @if($order4First)
        <h5 class="header-title pb-3">
            {{$order4First->category_name}}
        </h5>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center position-relative">
                    <a href="{{route('category.news.show',['category'=>$order4First->category_slug,'c_id'=>$order4First->c_id])}}"
                       class="card  border-0 ">
                        <img src="{{getResizeImage($order4First->image,'fits-in/350x300')}}"
                             class="card-img"
                             alt="{{$news->image_alt ?? $news->image_description ?? ''}}"/>

                        <div class="card-img-overlay bg-gradient-primary  p-3 mt-5 text-white bottom-0" style="top:65%">
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
                            <div class="d-flex align-items-center  {{ $loop->remaining > 1 ? 'border-bottom' : '' }} mb-3">
                                <figure
                                    class="post_img">
                                    <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}">
                                        <img src="{{getResizeImage($news->image,'/fit-in/250x150')}}"
                                             class="card-img"
                                        style="width: 100px;height: 80px;object-fit:cover"

                                             alt="{{$news->image_alt ?? $news->image_description ?? ''}}"/>
                                    </a>
                                </figure>
                                <div class="ps-3">
                                    <h5 class="fw-bold medium-title fs-5">
                                        <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}">
                                            {{\Illuminate\Support\Str::limit($news->title, 93)}}
                                        </a>
                                    </h5>
                                    <p class="text-muted fw-bold">
                                        {{$news->guest ?? $news->reporter_name ?? '' }}
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
