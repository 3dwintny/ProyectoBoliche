@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">

        @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a class="page-link"><i class="fa fa-fw fa-regular fa-hand-point-left"></i></a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <i class="page-link fa fa-fw fa-regular fa-hand-point-left"></i>
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @else
                            <li><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <i class="page-link fa fa-fw fa-regular fa-hand-point-right"></i>
                    </a>
                </li>
            @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a class="page-link"><i class="fa fa-fw fa-regular fa-hand-point-right"></i></a>
            </li>
            @endif
    </ul>
</nav>
@endif 