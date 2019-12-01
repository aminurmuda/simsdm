<?php

namespace App\Http\Controllers;

use App\Division;
use App\Department;
use App\Project;
use App\RequestEmployee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $divisions = count(Division::all());
        $departments = count(Department::all());
        $projects = count(Project::all());
        $requests = count(RequestEmployee::all());

        return view('home', compact('divisions', 'departments', 'projects', 'requests'));
    }
}
