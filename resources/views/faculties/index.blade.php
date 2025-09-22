@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Faculties</h2>
    <a href="{{ route('faculties.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        + Add Faculty
    </a>
</div>

<div class="bg-white shadow rounded-lg overflow-hidden">
    <table class="w-full border-collapse">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left text-sm font-medium text-gray-600">#</th>
                <th class="p-3 text-left text-sm font-medium text-gray-600">Name</th>
                <th class="p-3 text-left text-sm font-medium text-gray-600">University</th>
                <th class="p-3 text-center text-sm font-medium text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($faculties as $faculty)
            <tr class="border-t hover:bg-gray-50">
                <td class="p-3 text-sm text-gray-700">{{ $faculty->id }}</td>
                <td class="p-3 text-sm font-semibold text-gray-800">{{ $faculty->name }}</td>
                <td class="p-3 text-sm text-gray-600">{{ $faculty->university->name ?? '-' }}</td>
                <td class="p-3 text-center">
                    <a href="{{ route('faculties.edit', $faculty->id) }}"
                       class="inline-block bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 mr-2 transition">
                        Edit
                    </a>
                    <form action="{{ route('faculties.destroy', $faculty->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')"
                                class="inline-block bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-6 text-center text-gray-500">No faculties found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Pagination --}}
@if ($faculties->hasPages())
<div class="mt-6 flex items-center justify-between">
    <p class="text-sm text-gray-600">
        Showing <strong>{{ $faculties->firstItem() }}</strong> to <strong>{{ $faculties->lastItem() }}</strong> of <strong>{{ $faculties->total() }}</strong>
    </p>

    <div class="flex space-x-1">
        {{-- Previous --}}
        @if ($faculties->onFirstPage())
            <span class="px-3 py-1 border bg-gray-200 text-gray-400 cursor-not-allowed">Prev</span>
        @else
            <a href="{{ $faculties->previousPageUrl() }}"
               class="px-3 py-1 border bg-white text-gray-700 hover:bg-blue-50">Prev</a>
        @endif

        {{-- Page Numbers --}}
        @foreach ($faculties->links()->elements[0] ?? [] as $page => $url)
            @if ($page == $faculties->currentPage())
                <span class="px-3 py-1 border bg-blue-600 text-white">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="px-3 py-1 border bg-white text-gray-700 hover:bg-blue-50">{{ $page }}</a>
            @endif
        @endforeach

        {{-- Next --}}
        @if ($faculties->hasMorePages())
            <a href="{{ $faculties->nextPageUrl() }}"
               class="px-3 py-1 border bg-white text-gray-700 hover:bg-blue-50">Next</a>
        @else
            <span class="px-3 py-1 border bg-gray-200 text-gray-400 cursor-not-allowed">Next</span>
        @endif
    </div>
</div>
@endif
@endsection
