<?php

namespace App\Http\Controllers;

use App\Division;
use App\User;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index() {
        $divisions = Division::with('manager')->get();
        return view('divisions.index', compact('divisions'));
    }
    
    public function create() {
        $managers = User::all();
        return view('divisions.create', compact('managers'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'manager_id' => 'required',
        ]);
        $division = Division::create($validatedData);
        return redirect('/divisions')->with('success', 'Division has been added');
    }

    public function show($id) {
        $division = Division::findOrFail($id);
        return view('divisions.show', compact('division'));
    }

    public function edit($id) {
        $division = Division::findOrFail($id);
        $managers = User::all();
        return view('divisions.edit', compact('division', 'managers'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'manager_id' => 'required',
        ]);
        Division::whereId($id)->update($validatedData);

        return redirect('/divisions')->with('success', 'Division has been updated');
    }

    public function destroy($id) {
        $division = Division::findOrFail($id);
        $division->delete();

        return redirect('/divisions')->with('success', 'Division has been deleted successfully');
    }
}
