@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Add Department</h2>

<form action="{{ route('departments.store') }}" method="POST" class="bg-white p-6 rounded shadow">
    @csrf

    <div class="mb-4">
        <label class="block mb-1 font-semibold">Department Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="w-full border p-2 rounded" placeholder="Enter department name">
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">Faculty</label>
        <select name="faculty_id" class="w-full border p-2 rounded">
            <option value="">Select Faculty</option>
            @foreach($faculties as $faculty)
                <option value="{{ $faculty->id }}" {{ old('faculty_id') == $faculty->id ? 'selected' : '' }}>
                    {{ $faculty->name }} ({{ $faculty->university->name }})
                </option>
            @endforeach
        </select>
        @error('faculty_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Department</button>
</form>
@endsection
