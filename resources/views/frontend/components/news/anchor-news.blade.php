@isset($anchorNews)
    <section class="container mt-5">
        <div class="row">
            @php($anchorFirst = $anchorNews->first())
            <!-- column should be col-md-9 if ads other wise col-md-12 -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <a href="{{route('newsByCategory','anchor')}}">
                            <h5 class="header-title">एंकर</h5>
                        </a>
                    </div>
                    <div class="col-md-6">
                        @if($anchorFirst)
                            <a href="{{ route('category.news.show', [$anchorFirst->category_slug, $anchorFirst->c_id]) }}">
                                <figure class="position-relative cover-photo">
                                    <img
                                        src="{{$anchorFirst->image}}"
                                        alt="{!! $anchorFirst->title !!}"/>
                                </figure>
                                <h1 class="small-title">
                                    {!! $anchorFirst->title !!}
                                </h1>
                                <p class="post-description-sm">
                                    {!! $anchorFirst->short_description !!}
                                </p>
                            </a>
                        @endif
                    </div>
                    <div class="col-md-6 small-col">
                        <div class="row">
                            @foreach($anchorNews->skip(1) as $key=>$news)
                                <div class="col-md-6">
                                    <a href="{{ route('category.news.show', [$news->category_slug, $news->c_id]) }}"
                                       class="hover">
                                        <figure class="position-relative">
                                            <img src="{{getResizeImage($news->image)}}"
                                                 alt="{!! $news->title !!}"/>
                                        </figure>
                                        <h1 class="small-title">
                                            {!! $news->title !!}
                                        </h1>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- column should be display if ads -->
            {{-- <div class="col-md-3">
                <div class="sticky-top">
                    <img class="w-100 h-100 h-auto"
                         src="https://breaknlinks.s3.amazonaws.com/nepali/sep2/zoom%2020231013%20final.jpg"
                         alt="">
                    <img class="w-100 h-auto my-2"
                         src="https://breaknlinks.s3.amazonaws.com/nepali/file%201%202080/manaslu%20world%20college%20add%2020230820.jpg"
                         alt="">
                </div>
            </div> --}}
        </div>
    </section>
@endisset
