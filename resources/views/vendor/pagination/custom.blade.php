@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination Navigation" class="inline-flex items-center">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="mx-1 px-3 py-1 rounded-full bg-gray-100 text-gray-400 cursor-not-allowed">Prev</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="mx-1 px-3 py-1 rounded-full bg-white border text-gray-700 hover:bg-blue-50">Prev</a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <span class="mx-1 px-3 py-1 rounded-full bg-white border text-gray-500">{{ $element }}</span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span aria-current="page" class="mx-1 px-3 py-1 rounded-full bg-blue-600 text-white font-semibold">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="mx-1 px-3 py-1 rounded-full bg-white border text-gray-700 hover:bg-blue-50">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="mx-1 px-3 py-1 rounded-full bg-white border text-gray-700 hover:bg-blue-50">Next</a>
    @else
        <span class="mx-1 px-3 py-1 rounded-full bg-gray-100 text-gray-400 cursor-not-allowed">Next</span>
    @endif
</nav>
@endif
