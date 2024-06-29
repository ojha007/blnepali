@isset($trendingNews)
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-12">
                <h5 class="header-title">ट्रेन्डिङ</h5>
            </div>
            @foreach($trendingNews as $news)
                <div class="col-md">
                    <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}">
                        <div class="media d-flex align-items-center">
                            <h1 class="p-1 numbering">{{__("messages.".$loop->iteration)}}</h1>
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
@endisset
