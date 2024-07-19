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
                        <div class="text-left fw-bolder fs-1 text-black py-2 fw-bolder rounded-2">
                            <h4 class="a-hover text-left fs-1 fw-bold">
                                <svg style="width: 35px; height: 30px;" class="me-2" viewBox="0 0 16 16" version="1.1" aria-hidden="true">
                                    <title>blinking-dot</title>
                                    <g>
                                        <circle cx="8" cy="8" r="7.16" stroke="#c31833" stroke-width="1.68" fill="#ffffff"></circle>
                                        <circle cx="8" cy="8" r="4" fill="#c31833">
                                            <animate attributeName="opacity" values="1;1;1;1;0;1" dur="2.5s" repeatCount="indefinite"></animate>
                                        </circle>
                                    </g>
                                </svg>
                                {{\Illuminate\Support\Str::limit($news->title, 50)}}
                            </h4>
                            <div class="news-detail my-2">

                                <p>
                                    
                                    {{\Illuminate\Support\Str::limit($news->short_description, 74)}}
                                </p>
                            </div>
                            <h4 class="mt-3" style="color: #f06023">
                                {{$news->reporter_name}}
                            </h4>
                        </div>
                    </a>
                </div>
                <div class="col-md-7">
                    <div class="" style="background: url('{{ $news->image }}'); background-repeat: no-repeat; height: 450px;background-position:top; background-size: cover; border-radius: 10px;" class="container banner position-relative text-center my-5 py-4">
                       
                    </div>
                </div>
            </div>
            @endforeach

@endisset
