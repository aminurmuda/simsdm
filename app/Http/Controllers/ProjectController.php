<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectsUsers;
use App\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with('manager')->get();
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
        $members = ProjectsUsers::select('users.id', 'users.name', 'users.email')->where('project_id', $project->id)
        ->leftJoin('users', 'users.id', '=', 'projects_users.user_id')
        ->get();
        return view('projects.show', compact('project', 'members'));
    }

    public function edit($id) {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }
    
    public function assignManager($id) {
        $project = Project::findOrFail($id);
        $managers = User::all();
        return view('projects.assign-manager', compact('project', 'managers'));
    }

    public function assignMember($id) {
        $project = Project::findOrFail($id);
        $users = User::all();
        return view('projects.assign-member', compact('project', 'users'));
    }

    public function storeAssignManager(Request $request, $id) {
        $project = Project::findOrFail($id);
        $project->manager_id = $request['manager_id'];
        $project->save();
        $manager = User::find($project->manager_id);
        $members = ProjectsUsers::select('users.id', 'users.name', 'users.email')->where('project_id', $project->id)
        ->leftJoin('users', 'users.id', '=', 'projects_users.user_id')
        ->get();
        return view('projects.show', compact('project', 'manager', 'members'));
    }

    public function storeAssignMember(Request $request, $id) {
        $selected_users = $request->input('selected');
        foreach($selected_users as $user){
            $data = array('project_id' =>$id, 'user_id' => $user);
            ProjectsUsers::create($data);
        }
        return redirect('/projects/'.$id)->with('success', 'Project has been updated');
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
