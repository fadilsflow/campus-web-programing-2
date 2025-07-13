@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation">
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true">
            <span class="page-link" style="background-color: #d63384; color: white;">{!! __('pagination.previous') !!}</span>
        </li>
        @else
        <li class="page-item btn-pink">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" style="background-color: #d63384; color: white;">
                {!! __('pagination.previous') !!}
            </a>
        </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item ">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" style="background-color: #d63384; color: white;">{!! __('pagination.next') !!}</a>
        </li>
        @else
        <li class="page-item disabled  " style="background-color: #d63384;" aria-disabled="true">
            <span class="page-link">{!! __('pagination.next') !!}</span>
        </li>
        @endif
    </ul>
</nav>
@endif