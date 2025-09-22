@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold text-gray-800">Universities</h2>
    <a href="{{ route('universities.create') }}"
       class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow hover:bg-indigo-700 transition">
        + Add University
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full min-w-full table-auto">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3 text-sm font-medium text-gray-700">#</th>
                <th class="p-3 text-sm font-medium text-gray-700">Name</th>
                <th class="p-3 text-sm font-medium text-gray-700">Location</th>
                <th class="p-3 text-sm font-medium text-gray-700 text-center">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($universities as $university)
            <tr class="border-t hover:bg-gray-50">
                <td class="p-3 text-sm text-gray-700">{{ $university->id }}</td>
                <td class="p-3 text-sm text-gray-800 font-medium">{{ $university->name }}</td>
                <td class="p-3 text-sm text-gray-600">{{ $university->location }}</td>
                <td class="p-3 text-sm text-center">
                    <a href="{{ route('universities.edit', $university->id) }}"
                       class="inline-block bg-yellow-400 text-white px-3 py-1 rounded-md hover:bg-yellow-500 transition mr-2">
                        Edit
                    </a>
                    <form action="{{ route('universities.destroy', $university->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')"
                                class="inline-block bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-6 text-center text-gray-500">No universities found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Showing X - Y of Z --}}
@if($universities->total() > 0)
<div class="mt-4 flex items-center justify-between">
    <p class="text-sm text-gray-600">
        Showing <strong>{{ $universities->firstItem() }}</strong> to <strong>{{ $universities->lastItem() }}</strong> of <strong>{{ $universities->total() }}</strong> universities
    </p>

    {{-- Use custom view below: resources/views/vendor/pagination/custom.blade.php --}}
    <div>
        {{ $universities->links('vendor.pagination.custom') }}
    </div>
</div>
@else
<div class="mt-4"></div>
@endif
@endsection
