<section class="container mt-5">
    <div class="row">
        <!-- column should be col-md-9 if ads other wise col-md-12 -->
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <h5 class="header-title">एंकर</h5>
                </div>
                <div class="col-md-6">
                    @php($anchorFirst = $anchorNews->first())

                    @if($anchorFirst)
                        <figure class="position-relative cover-photo">
                            <img
                                src="{{$anchorFirst->image}}"
                                alt="{!! $anchorFirst->title !!}"/>
                            <figcaption>{!! $anchorFirst->date_line ?? "" !!}</figcaption>
                        </figure>
                        <a href="{{route('category.news.show',[$anchorFirst->category_slug,'c_id'=>$anchorFirst->c_id])}}">
                            <h1 class="small-title">
                                {!! $anchorFirst->title !!}
                            </h1>
                            <p class="post-description">
                                {!! $anchorFirst->sub_title !!}
                            </p>
                        </a>
                    @endif
                </div>
                <div class="col-md-6 small-col">
                    <div class="row">
                        @foreach($anchorNews->skip(1) as $key=>$news)
                            <div class="col-md-6">
                                <figure class="position-relative">
                                    <img src="{{getResizeImage($news->image)}}"
                                         alt="{!! $news->title !!}"/>
                                    <figcaption>{!! $news->date_line ?? "" !!}</figcaption>
                                </figure>
                                <a href="{{route('category.news.show',[$news->category_slug,'c_id'=>$news->c_id])}}">
                                    <h1 class="small-title">
                                        {!! \Illuminate\Support\Str::limit($news->title) !!}
                                    </h1>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- column should be display if ads -->
        <div class="col-md-3">
            <div class="sticky-top">
                <img class="w-100 h-100 h-auto"
                     src="https://breaknlinks.s3.amazonaws.com/nepali/sep2/zoom%2020231013%20final.jpg"
                     alt="">
                <img class="w-100 h-auto my-2"
                     src="https://breaknlinks.s3.amazonaws.com/nepali/file%201%202080/manaslu%20world%20college%20add%2020230820.jpg"
                     alt="">
            </div>
        </div>
    </div>
</section>
