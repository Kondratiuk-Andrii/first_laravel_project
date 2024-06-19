@if ($paginator->hasPages())
    <nav class="pagination-container">
        <ul class="pagination-list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pagination-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="pagination-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="pagination-item">
                    <a class="pagination-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @php
                $maxPages = 6; // Максимальное количество страниц для отображения
                $halfTotalLinks = floor($maxPages / 2);
                $currentPage = $paginator->currentPage();
                $lastPage = $paginator->lastPage();
                $start = max($currentPage - $halfTotalLinks, 1);
                $end = min($currentPage + $halfTotalLinks, $lastPage);
            @endphp

            {{-- "Previous" Dots Separator --}}
            @if ($start > 1)
                <li class="pagination-item">
                    <a class="pagination-link" href="{{ $paginator->url(1) }}">1</a>
                </li>
                @if ($start > 2)
                    <li class="pagination-item disabled" aria-disabled="true"><span class="pagination-link">...</span>
                    </li>
                @endif
            @endif

            {{-- Pagination Links --}}
            @for ($i = $start; $i <= $end; $i++)
                @if ($i == $paginator->currentPage())
                    <li class="pagination-item active" aria-current="page"><span
                            class="pagination-link">{{ $i }}</span></li>
                @else
                    <li class="pagination-item"><a class="pagination-link"
                            href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                @endif
            @endfor

            {{-- "Next" Dots Separator --}}
            @if ($end < $lastPage)
                @if ($end < $lastPage - 1)
                    <li class="pagination-item disabled" aria-disabled="true"><span class="pagination-link">...</span>
                    </li>
                @endif
                <li class="pagination-item">
                    <a class="pagination-link" href="{{ $paginator->url($lastPage) }}">{{ $lastPage }}</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination-item">
                    <a class="pagination-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                        aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="pagination-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="pagination-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
