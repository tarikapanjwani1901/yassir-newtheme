@if ($paginator->hasPages())
<div class="ltn__pagination-area text-center">
    <div class="ltn__pagination" id="custompagination">
        <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <li><a href="#"><i class="fas fa-angle-double-left"></i></a>
                @else
            <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-angle-double-left"></i></a>
                @endif

                @if($paginator->currentPage() > 3)
            <li><a href="{{ $paginator->url(1) }}">1</a></li>
            @endif
            @if($paginator->currentPage() > 4)
            <li><a>...</a></li>
            @endif
            @foreach(range(1, $paginator->lastPage()) as $i)
                @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                    @if ($i == $paginator->currentPage())
                        <li class="active"><a href="#">{{ $i }}</a></li>
                    @else
                        <li><a href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endif
            @endforeach
            @if($paginator->currentPage() < $paginator->lastPage() - 3)
                <li><a>...</a></li>
            @endif
            @if($paginator->currentPage() < $paginator->lastPage() - 2)
                <li><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                        </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-angle-double-right"></i></a>
            @else
                <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
            @endif
        </ul>
    </div>
</div>
@endif