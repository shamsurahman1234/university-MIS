@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Edit University</h2>

<form action="{{ route('universities.update', $university->id) }}" method="POST" class="bg-white p-6 rounded shadow">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block mb-1 font-semibold">University Name</label>
        <input type="text" name="name" value="{{ old('name', $university->name) }}" class="w-full border p-2 rounded">
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">Location</label>
        <input type="text" name="location" value="{{ old('location', $university->location) }}" class="w-full border p-2 rounded">
        @error('location')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update University</button>
</form>
@endsection
