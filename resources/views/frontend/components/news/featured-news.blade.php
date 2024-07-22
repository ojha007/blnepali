@isset($breakingNews)

@php($breakFirst = $breakingNews->first())

        @if($breakFirst)

            <div class="text-only-news text-center">
                <a href="{{ route('showDetail', ['c_id' => $breakFirst->c_id]) }}">
                    <h1>
                        {!! $breakFirst->title !!}
                    </h1>
                </a>
            </div>
        @endif
            @foreach($breakingNews->skip(1)->take(1) as $key => $news)
            <div class="row">
                <div class="col-md-5">
                    <a href="{{ route('showDetail', ['c_id' => $news->c_id]) }}" class="a-hover">

                        <div class="text-left fw-bolder fs-1 text-black fw-bolder rounded-2">
                            
                            @if($news->slug)
                                <h4 class="featured-title">
                                    {{$news->slug}}
                                </h4>
                            @endif
                            <h4 class="a-hover text-left fs-1 fw-bold">

                                {{$news->title}}
                                
                                {{-- {{\Illuminate\Support\Str::limit($news->title, 50)}} --}}
                            </h4>
                            <div class="feature-news my-2">

                                <p>
                                    {{\Illuminate\Support\Str::limit($news->short_description, 500)}}
                                </p>
                                <p class="text-muted fs-6 fw-bold text-info">
                                    {{$news->reporter_name}}
                                </p>
                            </div>
                            
                        </div>
                    </a>
                </div>
                <div class="col-md-7">
                    <div class="" style="background: url('{{ $news->image }}'); background-repeat: no-repeat; height: 340px;background-position:top; background-size: cover; border-radius: 10px;" class="container banner position-relative text-center my-5 py-4">
                       
                    </div>
                </div>
            </div>
            @endforeach

@endisset
