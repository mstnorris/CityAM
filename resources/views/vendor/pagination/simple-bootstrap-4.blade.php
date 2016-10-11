@if ($paginator->hasPages())
    <nav aria-label="News Articles Pages">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link">&larr;</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"
                                         rel="prev">&larr;</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&rarr;</a>
                </li>
            @else
                <li class="page-item disabled"><span class="page-link">&rarr;</span></li>
            @endif
        </ul>
    </nav>
@endif
