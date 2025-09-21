@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Add Department</h2>

    <form action="{{ route('departments.store') }}" method="POST">
        @csrf

        <!-- Department Name -->
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Department Name</label>
            <input type="text" name="name" class="w-full border p-2 rounded" value="{{ old('name') }}" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- University -->
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">University</label>
            <select name="university_id" id="university" class="w-full border p-2 rounded" required>
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

        <!-- Faculty -->
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Faculty</label>
            <select name="faculty_id" id="faculty" class="w-full border p-2 rounded" required>
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
</div>

<script>
    const universitySelect = document.getElementById('university');
    const facultySelect = document.getElementById('faculty');
    const faculties = @json($faculties);

    universitySelect.addEventListener('change', function() {
        const universityId = this.value;
        facultySelect.innerHTML = '<option value="">Select Faculty</option>';

        faculties.forEach(faculty => {
            if(faculty.university_id == universityId) {
                const option = document.createElement('option');
                option.value = faculty.id;
                option.text = faculty.name;
                facultySelect.appendChild(option);
            }
        });
    });
</script>
@endsection
