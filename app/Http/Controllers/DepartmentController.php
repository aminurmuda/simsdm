<?php

namespace App\Http\Controllers;

use App\Department;
use App\Division;
use App\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index() {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }
    
    public function create() {
        $managers = User::all();
        $divisions = Division::all();
        return view('departments.create', compact('managers', 'divisions'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'division_id' => 'required',
            'manager_id' => 'required',
        ]);
        $department = Department::create($validatedData);
        return redirect('/departments')->with('success', 'Department has been added');
    }

    public function show($id) {
        $department = Department::findOrFail($id);
        $division = Division::findOrFail($department->division_id);
        $manager = User::findOrFail($department->manager_id);
        return view('departments.show', compact('department', 'manager', 'division'));
    }

    public function edit($id) {
        $department = Department::findOrFail($id);
        $divisions = Division::all();
        $managers = User::all();
        return view('departments.edit', compact('department', 'managers', 'divisions'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'manager_id' => 'required',
            'division_id' => 'required',
        ]);
        Department::whereId($id)->update($validatedData);

        return redirect('/departments')->with('success', 'Department has been updated');
    }

    public function destroy($id) {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect('/departments')->with('success', 'Department has been deleted successfully');
    }
}
