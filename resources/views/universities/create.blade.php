@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Add University</h2>

<form action="{{ route('universities.store') }}" method="POST" class="bg-white p-6 rounded shadow">
    @csrf

    <div class="mb-4">
        <label class="block mb-1 font-semibold">University Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="w-full border p-2 rounded" placeholder="Enter university name">
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block mb-1 font-semibold">Location</label>
        <input type="text" name="location" value="{{ old('location') }}" class="w-full border p-2 rounded" placeholder="Enter location (optional)">
        @error('location')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add University</button>
</form>
@endsection
