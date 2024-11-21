<?php
namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // Display a list of all departments
    public function index()
    {
        $departments = Department::all();
        \Log::info($departments); // Log the retrieved departments
        return view('contents.departments.index', compact('departments'));
    }

    // Show the form for creating a new department
    public function create()
    {
        return view('contents.departments.create');
    }

    // Store a newly created department in storage
    public function store(Request $request)
    {
        $request->validate([
            'dep_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'no_of_employees' => 'required|integer|min:0',
        ]);

        // Generate dep_id in the format DEP000
        $latestId = Department::count() + 1; // Get the latest count
        $depId = 'DEP' . str_pad($latestId, 3, '0', STR_PAD_LEFT); // Format the ID

        Department::create([
            'dep_id' => $depId,
            'dep_name' => $request->dep_name,
            'designation' => $request->designation,
            'no_of_employees' => $request->no_of_employees,
        ]);

        return redirect()->route('departments.index')->with('success', 'Department added successfully.');
    }

    // Show the form for editing a department
    //public function edit($id)
   // {
      //  $department = Department::findOrFail($id);
      //  return view('departments.edit', compact('department'));
   // }

    // Update an existing department
  /*  public function update(Request $request, $id)
    {
        $request->validate([
            'dep_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'no_of_employees' => 'required|integer|min:0',
        ]);

        $department = Department::findOrFail($id);
        $department->update([
            'dep_name' => $request->dep_name,
            'designation' => $request->designation,
            'no_of_employees' => $request->no_of_employees,
        ]);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }*/

    // Delete a department
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}