@if ($paginator->hasPages())
    {{-- Previous Page Link --}}
    @if ( ! $paginator->onFirstPage())
        <a class="btn btn-primary pull-xs-left" href="{{ $paginator->previousPageUrl() }}"
           rel="prev">&larr; Newer</a>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a class="btn btn-primary pull-xs-right" href="{{ $paginator->nextPageUrl() }}" rel="next">Older &rarr;</a>
    @endif
@endif
