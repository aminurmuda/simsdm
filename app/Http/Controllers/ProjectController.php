<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }
    
    public function create() {
        return view('projects.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $project = Project::create($validatedData);
        return redirect('/projects')->with('success', 'Project has been added');
    }

    public function show($id) {
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    public function edit($id) {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        Project::whereId($id)->update($validatedData);

        return redirect('/projects')->with('success', 'Project has been updated');
    }

    public function destroy($id) {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect('/projects')->with('success', 'Project has been deleted successfully');
    }
}
