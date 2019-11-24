<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\RoleList;
use App\Skill;
use App\SkillsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create() {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    protected function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'role_id' => 'required',
            ]);
            
            $name = $validatedData['name'];
            $email = $validatedData['email'];
            $password = Hash::make($validatedData['password']);
            $role_id = $validatedData['role_id'];
            $data = array('name' =>$name, 'email' => $email, 'password' => $password, 'role_id' => $role_id);

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
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'User has been deleted successfully');
    }

    public function addSkill($id) {
        $user = User::findOrFail($id);
        $skills = Skill::all();
        return view('users.add-skill', compact('user', 'skills'));
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
