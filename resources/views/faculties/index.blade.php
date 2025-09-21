@extends('layouts.app')

@section('content')
<div class="flex justify-between mb-4">
    <h2 class="text-2xl font-bold">Faculties</h2>
    <a href="{{ route('faculties.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Faculty</a>
</div>

<table class="w-full bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-200 text-left">
            <th class="p-3">#</th>
            <th class="p-3">Name</th>
            <th class="p-3">University</th>
            <th class="p-3">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($faculties as $faculty)
        <tr class="border-t">
            <td class="p-3">{{ $faculty->id }}</td>
            <td class="p-3">{{ $faculty->name }}</td>
            <td class="p-3">{{ $faculty->university->name }}</td>
            <td class="p-3 space-x-2">
                <a href="{{ route('faculties.edit', $faculty->id) }}" class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500">Edit</a>
                <form action="{{ route('faculties.destroy', $faculty->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
