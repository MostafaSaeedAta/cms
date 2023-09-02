@if ($paginator->hasPages())
    <div class="paginations">
        <ul class="pager">
            @if ($paginator->onFirstPage())
                <li>
                    <a class="prev-page disabled" href="#" aria-disabled="true"></a>
                </li>
            @else
                <li>
                    <a class="prev-page" href="{{ $paginator->previousPageUrl() }}"></a>
                </li>
            @endif
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <a class="page-dotted disabled" href="#" aria-disabled="true"></a>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <a class="active" href="#" aria-current="page">{{ $page }}</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <li>
                    <a class="next-page" href="{{ $paginator->nextPageUrl() }}"></a>
                </li>
            @else
                <li>
                    <a class="next-page disabled" href="#" aria-disabled="true"></a>
                </li>
            @endif
        </ul>
    </div>
@endif
