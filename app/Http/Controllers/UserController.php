<?php

namespace App\Http\Controllers;

use App\User;
use App\Skill;
use App\SkillsUsers;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create() {

    }

    public function store(Request $request) {
        
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
}
