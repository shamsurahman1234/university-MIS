@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Dashboard</h2>
<div class="grid grid-cols-3 gap-4">
    <div class="bg-white p-4 shadow rounded">
        <h3 class="font-bold text-lg">Universities</h3>
        <p class="text-gray-600">{{ \App\Models\University::count() }}</p>
    </div>
    <div class="bg-white p-4 shadow rounded">
        <h3 class="font-bold text-lg">Faculties</h3>
        <p class="text-gray-600">{{ \App\Models\Faculty::count() }}</p>
    </div>
    <div class="bg-white p-4 shadow rounded">
        <h3 class="font-bold text-lg">Departments</h3>
        <p class="text-gray-600">{{ \App\Models\Department::count() }}</p>
    </div>
</div>
@endsection
