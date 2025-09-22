@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-extrabold text-gray-800">Departments</h2>
    <a href="{{ route('departments.create') }}" 
       class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-5 py-2 rounded-2xl shadow hover:from-indigo-600 hover:to-purple-700 transition">
        + Add Department
    </a>
</div>

<div class="overflow-hidden rounded-2xl shadow-lg bg-white">
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gradient-to-r from-indigo-100 to-purple-100 text-gray-800">
                <th class="p-4 text-left font-semibold">#</th>
                <th class="p-4 text-left font-semibold">Department Name</th>
                <th class="p-4 text-left font-semibold">Faculty</th>
                <th class="p-4 text-left font-semibold">University</th>
                <th class="p-4 text-center font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($departments as $department)
            <tr class="hover:bg-gray-50 border-t">
                <td class="p-4">{{ $department->id }}</td>
                <td class="p-4 font-medium text-gray-700">{{ $department->name }}</td>
                <td class="p-4 text-gray-600">{{ $department->faculty->name ?? '-' }}</td>
                <td class="p-4 text-gray-600">{{ $department->faculty->university->name ?? '-' }}</td>
                <td class="p-4 flex justify-center space-x-3">
                    <a href="{{ route('departments.edit', $department->id) }}" 
                       class="bg-yellow-400 text-white px-3 py-1 rounded-xl shadow hover:bg-yellow-500 transition">
                        ✏️ Edit
                    </a>
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" 
                                class="bg-red-500 text-white px-3 py-1 rounded-xl shadow hover:bg-red-600 transition">
                            🗑️ Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-6 text-center text-gray-500">No departments found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- custom styled pagination (uses the custom view below) --}}
<div class="mt-6 flex justify-center">
    {{ $departments->links('vendor.pagination.custom') }}
</div>
@endsection
