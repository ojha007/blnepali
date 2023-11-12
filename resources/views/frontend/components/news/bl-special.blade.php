<section class="container-fluid my-5 bishesh py-5" style="background-color: #082332">
    <div class="container">
        <div class="col-md-12 mb-4">
            <h5 class="header-title text-white">बिएल विशेष</h5>
        </div>
        <div class="row">
            @foreach($blSpecialNews as $news)
                <div class="col-md-3 a-hover">
                    <div class="black-box">
                        <figure class="position-relative">
                            <img src="{{$news->image}}"
                                 alt="{{$news->title}}">
                        </figure>
                        <a href="{{route('category.news.show',[$news->category_slug,$news->c_id])}}" class="a-hover">
                            <h1 class="small-title p-3 text-white">
                                {!! \Illuminate\Support\Str::limit($news->title) !!}
                            </h1>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
