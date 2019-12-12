<?php

namespace App\Http\Controllers;

use Auth;
use App\Customer;
use App\Department;
use App\Project;
use App\ProjectsUsers;
use App\RequestEmployee;
use App\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $users = User::all();
        // Admin
        if(Auth::user()->role_id == '1') {
            $projects = Project::with('manager')->get();
            return view('projects.index', compact('projects'));
        } 
        
        // Karyawan
        else if(Auth::user()->role_id == '2') {
            $projects = Project::with('users')->with('manager')->get();
            return view('projects.index', compact('projects'));
        } 
        
        // Division Manager
        else if(Auth::user()->role_id == '3') {
            $projects = Project::with('users')->with('manager')->get();
            return view('projects.index-division-manager', compact('projects'));
        } 
        
        
        // Department Manager
        else if(Auth::user()->role_id == '4') {
            $projects = Project::with('users')->with('manager')->where('department_id', '=', Auth::user()->department->id)->get();
            return view('projects.index-department-manager', compact('projects','users'));
        } 
        
        // Project Manager
        else if(Auth::user()->role_id == '5') {
            $projects = Project::where('manager_id',Auth::user()->id)->get();
            return view('projects.index-project-manager', compact('projects'));
        } 

        else {
            return view('unauthorized');
        }
    }
    
    public function create() {
        $customers = Customer::all();
        $departments = Department::all();
        return view('projects.create', compact('customers', 'departments'));
    }

    public function store(Request $request) {
        $status_id = 1;
        $request->request->add(['status_id' => $status_id]);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'customer_id' => 'required',
            'department_id' => 'required',
            'status_id' => 'required',
            'address' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $project = Project::create($validatedData);
        return redirect('/projects')->with('success', 'Project has been added');
    }

    public function show($id) {
        if(Auth::user()->role_id == '1') {
            $project = Project::findOrFail($id);
            $project_members = ProjectsUsers::with('user')->where('project_id', '=', $id)->get();
            return view('projects.show-admin', compact('project', 'project_members'));
        } 
        
        else if(Auth::user()->role_id == '3') {
            $project = Project::findOrFail($id);
            $project_members = ProjectsUsers::with('user')->where('project_id', '=', $id)->get();
            return view('projects.show-division-manager', compact('project', 'project_members'));
        } 

        else if(Auth::user()->role_id == '4') {
            $project = Project::findOrFail($id);
            $project_members = ProjectsUsers::with('user')->where('project_id', '=', $id)->get();
            return view('projects.show-department-manager', compact('project', 'project_members'));
        } 

        else if(Auth::user()->role_id == '5') {
            $project = Project::findOrFail($id);
            $project_members = ProjectsUsers::with('user')->where('project_id', '=', $id)->get();
            return view('projects.show-project-manager', compact('project', 'project_members'));
        } 

        else {
            $project = Project::findOrFail($id);
            $project_members = ProjectsUsers::with('user')->where('project_id', '=', $id)->get();
            return view('projects.show', compact('project', 'project_members'));
        }
        
    }

    public function edit($id) {
        $project = Project::findOrFail($id);
        $customers = Customer::all();
        return view('projects.edit', compact('project', 'customers'));
    }
    
    public function assignManager($id) {
        $project = Project::findOrFail($id);
        $managers = User::all();
        return view('projects.assign-manager', compact('project', 'managers'));
    }

    public function assignMember($id) {
        $project = Project::findOrFail($id);
        $users = User::with(['skills', 'skills.skill'])
        ->where('department_id', '=', $project->department_id)
        ->where('id', '!=', '1')->get()->all();
        $existing_project_members = ProjectsUsers::where('project_id',$id)->pluck('user_id')->toArray();
        $users = array_filter($users, function($user) use($existing_project_members) {
            return !in_array($user->id, $existing_project_members);
        });
        $users = collect(array_values($users));
        return view('projects.assign-member', compact('project', 'users'));
    }

    public function storeAssignManager(Request $request, $id) {
        $project = Project::findOrFail($id);
        $manager_id = $request['manager_id'];
        Project::whereId($id)->update(['manager_id' => $manager_id]);
        $manager = User::find($project->manager_id);
        $members = ProjectsUsers::select('users.id', 'users.name', 'users.email')->where('project_id', $project->id)
        ->leftJoin('users', 'users.id', '=', 'projects_users.user_id')
        ->get();        
        return redirect('/projects/'. $id)->with('success', 'Project member has been added');
    }

    public function storeAssignMember(Request $request, $id) {
        $selected_members = array_values(collect($request->input('selected_members'))->where('user_id', '!=', null)->all());
        try {
            foreach($selected_members as $members){
                ProjectsUsers::updateOrCreate($members);
            }
            return response('success', 200);
        } catch (Exception $exception){
             return response($exception->getMessage(), $exception->getStatus());
        }
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'customer_id' => 'required',
            'address' => 'required|max:255',
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
