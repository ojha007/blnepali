@if ($paginator->hasPages())
    <div class="col-12 pagination-part">
        <nav>
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">{{trans('messages.previous')}}</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                           aria-label="@lang('pagination.previous')">{{trans('messages.previous')}}</a>
                    </li>
                @endif
                {{-- Pagination Elements --}}
                @isset($elements)
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span
                                    class="page-link">{{ $element }}</span>
                            </li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active active-btn" aria-current="page"><span
                                            class="page-link">{{ $page }}</span>
                                    </li>

                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endisset

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                           aria-label="@lang('pagination.next')">{{trans('pagination.next')}}</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link" aria-hidden="true">{{trans('pagination.next')}}</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif
<style>
    @media {
        @media (max-width: 560px) {
            ul.pagination li:not(.show-mobile) {
                display: none;
            }
        }
    }
</style>
@push('scripts')
    <script>
        (function ($) {
            $('ul.pagination li.active')
                // .prev().addClass('show-mobile')
                .prev().addClass('show-mobile');
            $('ul.pagination li.active')
                // .next().addClass('show-mobile')
                .next().addClass('show-mobile');
            $('ul.pagination')
                .find('li:first-child, li:last-child, li.active')
                .addClass('show-mobile');
        })(jQuery);
    </script>
@endpush
