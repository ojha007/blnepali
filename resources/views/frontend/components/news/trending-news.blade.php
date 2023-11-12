<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h5 class="header-title">ट्रेन्डिङ</h5>
        </div>
        @foreach($trendingNews as $news)
            <div class="col-md">
                <a href="{{route('category.news.show',[$news->category_slug,$news->c_id])}}">
                    <div class="media d-flex align-items-center">
                        <h1 class="p-3 numbering">{{__("messages.".$loop->iteration)}}</h1>
                        <div class="media-body">
                            <h3 class="fw-bold fs-5">
                                {!! $news->title !!}
                            </h3>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
