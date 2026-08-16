@if ($paginator->hasPages())
    <nav class="tfc-pagination" role="navigation" aria-label="Pagination Navigation">
        <div class="tfc-pagination-summary">
            Showing <strong>{{ $paginator->firstItem() }}</strong>–<strong>{{ $paginator->lastItem() }}</strong> of <strong>{{ $paginator->total() }}</strong>
        </div>
        <div class="tfc-pagination-links">
            @if ($paginator->onFirstPage())
                <span class="tfc-page tfc-page-disabled" aria-disabled="true">Previous</span>
            @else
                <a class="tfc-page tfc-page-nav" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="tfc-page tfc-page-dots">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="tfc-page tfc-page-current" aria-current="page">{{ $page }}</span>
                        @else
                            <a class="tfc-page" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a class="tfc-page tfc-page-nav" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
            @else
                <span class="tfc-page tfc-page-disabled" aria-disabled="true">Next</span>
            @endif
        </div>
    </nav>
@endif
