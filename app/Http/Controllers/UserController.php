<?php

namespace App\Http\Controllers;

use App\User;
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
        return view('users.show', compact('user'));
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
}
