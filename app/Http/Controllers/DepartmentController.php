<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\University;

class DepartmentController extends Controller
{
    public function index()
    {
        // load relations and paginate (10 per page)
        $departments = Department::with('faculty.university')
                                 ->orderBy('id', 'desc')
                                 ->paginate(10);

        return view('departments.index', compact('departments'));
    }


    public function create()
    {
        $universities = University::all();
        $faculties = Faculty::all();
        return view('departments.create', compact('universities', 'faculties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'university_id' => 'required|exists:universities,id',
            'faculty_id' => 'required|exists:faculties,id',
        ]);

        Department::create([
            'name' => $request->name,
            'faculty_id' => $request->faculty_id,
        ]);

        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    public function edit(Department $department)
    {
        $universities = University::all();
        $faculties = Faculty::all();
        return view('departments.edit', compact('department', 'universities', 'faculties'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'university_id' => 'required|exists:universities,id',
            'faculty_id' => 'required|exists:faculties,id',
        ]);

        $department->update([
            'name' => $request->name,
            'faculty_id' => $request->faculty_id,
        ]);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}
