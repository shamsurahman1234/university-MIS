@extends('layouts.app')

@section('content')
<div class="flex justify-between mb-4">
    <h2 class="text-2xl font-bold">Universities</h2>
    <a href="{{ route('universities.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add University</a>
</div>

<table class="w-full bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-200 text-left">
            <th class="p-3">#</th>
            <th class="p-3">Name</th>
            <th class="p-3">Location</th>
            <th class="p-3">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($universities as $university)
        <tr class="border-t">
            <td class="p-3">{{ $university->id }}</td>
            <td class="p-3">{{ $university->name }}</td>
            <td class="p-3">{{ $university->location }}</td>
            <td class="p-3 space-x-2">
                <a href="{{ route('universities.edit', $university->id) }}" class="bg-yellow-400 text-white px-2 py-1 rounded hover:bg-yellow-500">Edit</a>
                <form action="{{ route('universities.destroy', $university->id) }}" method="POST" class="inline">
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
