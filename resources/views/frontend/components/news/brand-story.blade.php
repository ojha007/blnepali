@isset($brandStory)
<div class="col-md-8">
    <h5 class="header-title">ब्राण्ड स्टोरी</h5>
    <div class="row">
        @foreach($brandStory as $news)
        <div class="col-md-4">
            <div class="pb-2">
                <figure class="position-relative">
                    <img src="{{ $news->image }}" alt="">
                </figure>
                <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}">
                    <h1 class="small-title py-1">
                        {!! $news->title !!}
                    </h1>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endisset
