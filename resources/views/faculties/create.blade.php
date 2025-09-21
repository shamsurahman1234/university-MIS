@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Add Faculty</h2>

<form action="{{ route('faculties.store') }}" method="POST" class="bg-white p-6 rounded shadow">
    @csrf

    <div class="mb-4">
        <label class="block mb-1 font-semibold">Faculty Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="w-full border p-2 rounded" placeholder="Enter faculty name">
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">University</label>
        <select name="university_id" class="w-full border p-2 rounded">
            <option value="">Select University</option>
            @foreach($universities as $university)
                <option value="{{ $university->id }}" {{ old('university_id') == $university->id ? 'selected' : '' }}>
                    {{ $university->name }}
                </option>
            @endforeach
        </select>
        @error('university_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Faculty</button>
</form>
@endsection
