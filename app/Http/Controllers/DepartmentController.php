<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // Display list of departments
    public function index()
    {
        // Eager load faculty and university
        $departments = Department::with('faculty.university')->get();
        return view('departments.index', compact('departments'));
    }

    // Show form to create new department
    public function create()
    {
        $faculties = Faculty::with('university')->get(); // load faculties with their university
        return view('departments.create', compact('faculties'));
    }

    // Store new department
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'faculty_id' => 'required|exists:faculties,id',
        ]);

        Department::create($request->all());

        return redirect()->route('departments.index')->with('success', 'Department added successfully.');
    }

    // Show form to edit a department
    public function edit(Department $department)
    {
        $faculties = Faculty::with('university')->get();
        return view('departments.edit', compact('department', 'faculties'));
    }

    // Update department
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'faculty_id' => 'required|exists:faculties,id',
        ]);

        $department->update($request->all());

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    // Delete department
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}
