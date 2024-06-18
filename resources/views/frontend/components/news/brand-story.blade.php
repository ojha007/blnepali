@isset($brandStory)
<div class="col-md-8">
    <h5 class="header-title">ब्राण्ड स्टोरी</h5>
    <div class="row">
        @foreach($brandStory as $story)
        <div class="col-md-4">
            <div class="pb-2">
                <figure class="position-relative">
                    <img src="{{ $story->image }}" alt="">
                </figure>
                <a href="{{ route('category.news.show', ['category' => $story->category_slug, 'c_id' => $story->c_id]) }}">
                    <h1 class="small-title py-1">
                        {{!! $story->title !!}}
                    </h1>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endisset
