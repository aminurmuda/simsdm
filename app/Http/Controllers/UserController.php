<?php

namespace App\Http\Controllers;

use Auth;
use App\Department;
use App\EmployeeStatus;
use App\Division;
use App\ProjectsUsers;
use App\Role;
use App\RoleList;
use App\Skill;
use App\SkillsUsers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        if(Auth::user()->role_id == '1') {
            return view('users.index-admin', compact('users'));
        }
        else if(Auth::user()->role_id == '4') {
            $employee_statuses = EmployeeStatus::all();
            return view('users.index-department-manager', compact('users', 'employee_statuses'));
        } 

        else {
            return view('unauthorized');
        }
    }

    public function create() {
        $roles = Role::all();
        $departments = Department::all();
        return view('users.create', compact('roles', 'departments'));
    }

    protected function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'role_id' => 'required',
            'department_id' => 'required',
            ]);
            
            $name = $validatedData['name'];
            $email = $validatedData['email'];
            $password = Hash::make($validatedData['password']);
            $role_id = $validatedData['role_id'];
            $department_id = $validatedData['department_id'];
            $status_id = 1;
            $data = array('name' =>$name, 'email' => $email, 'password' => $password, 'role_id' => $role_id, 'department_id' => $department_id, 'status_id' => $status_id);

        $user = User::create($data);
        $role_list = RoleList::create(['user_id' => $user->id, 'role_id' => $role_id]); //default role as an employee
        return redirect('/users')->with('success', 'Users has been created successfully');
    }

    public function show($id) {
        $user = User::find($id);
        $user_skills = SkillsUsers::where('user_id', '=', $id)->with('skill')->get();
        return view('users.show', compact('user','user_skills'));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'address' => 'required|max:255',
            'birth_place' => 'required|max:255',
            'birth_date' => 'required',
        ]);
        User::whereId($id)->update($validatedData);

        return redirect('/users')->with('success', 'User has been updated');
    }

    public function destroy($id) {
        ProjectsUsers::where('user_id', $id)->delete();
        RoleList::where('user_id', $id)->delete();
        SkillsUsers::where('user_id', $id)->delete();
        Department::where('manager_id', $id)->update(['manager_id' => null]);
        Division::where('manager_id', $id)->update(['manager_id' => null]);
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'User has been deleted successfully');
    }

    public function addSkill($id) {
        $user = User::findOrFail($id);
        $skills = Skill::all();
        return view('users.add-skill', compact('user', 'skills'));
    }

    public function deleteSkill($id) {
        $skills_users = SkillsUsers::findOrFail($id);
        $skills_users->delete();
        return redirect('/users/'. Auth::user()->id)->with('success', 'Skill has been deleted successfully');
    }

    public function storeSkill(Request $request, $id) {
        $skill_id = $request['skill_id'];
        $level = $request['level'];
        $data = array('user_id' =>$id, 'skill_id' => $skill_id, 'level' => $level);
        SkillsUsers::create($data);
        return redirect('/users/'.$id)->with('success', 'User has been deleted successfully');
    }

    public function changeRole($id) {
        $role_lists = RoleList::where('user_id', '=', $id)->get();
        return view('users.change-role', compact('role_lists'));
    }

    public function changeStatus(Request $request, $id) {
        $status_id = $request['status_id'];
        User::whereId($id)->update(['status_id' => $status_id]);
        return redirect('/users')->with('success', 'User status has been changed successfully');
    }

    public function storeChangeRole(Request $request, $id) {
        $role_id = $request['role_id'];
        try {
            User::whereId($id)->update(['role_id' => $role_id]);
            $user = User::find($id);
            return response($user, 200);
        } catch (Exception $exception){
             return response($exception->getMessage(), $exception->getStatus());
        }
    }
}
