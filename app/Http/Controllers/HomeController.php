<?php

namespace App\Http\Controllers;

use App\Division;
use App\AttendanceReport;
use App\Department;
use App\Project;
use App\RequestEmployee;
use App\RequestStatus;
use App\PaidLeave;
use App\PaidLeaveStatus;
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
        $paid_leaves = count(PaidLeave::all());
        $attendance_reports = count(AttendanceReport::all());

        // $request_statuses = [
        //     RequestEmployee::where('status_id', 1)->count(),
        //     RequestEmployee::where('status_id', 2)->count(),
        //     RequestEmployee::where('status_id', 3)->count(),
        //     RequestEmployee::where('status_id', 4)->count(),
        //     RequestEmployee::where('status_id', 5)->count()
        // ];

        // $requests = (object) [
        //     'labels' => [
        //         RequestStatus::where('id', 1)->get(),
        //         RequestStatus::where('id', 2)->get(),
        //         RequestStatus::where('id', 3)->get(),
        //         RequestStatus::where('id', 4)->get(),
        //         RequestStatus::where('id', 5)->get()
        //     ],
        //     'datasets' => [
        //         [
        //             'data'=> $request_statuses,
        //             'backgroundColor'=> [
        //                 '#1fc8db',
        //                 '#ed6c63',
        //                 '#fce473',
        //                 '#42afe3',
        //                 '#97cd76'
        //             ]
        //         ]
        //     ]
        // ];
        // $requests = json_encode($requests);

        // $paid_leaves_statuses = [
        //     PaidLeave::where('status_id', 1)->count(),
        //     PaidLeave::where('status_id', 2)->count(),
        //     PaidLeave::where('status_id', 3)->count(),
        // ];

        // $paid_leaves = (object) [
        //     'labels' => [
        //         PaidLeaveStatus::where('id', 1)->get(),
        //         PaidLeaveStatus::where('id', 1)->get(),
        //         PaidLeaveStatus::where('id', 1)->get()
        //     ],
        //     'datasets' => [
        //         [
        //             'data'=> $paid_leaves_statuses,
        //             'backgroundColor'=> [
        //                 '#1fc8db',
        //                 '#ed6c63',
        //                 '#fce473',
        //             ]
        //         ]
        //     ]
        // ];
        // $paid_leaves = json_encode($paid_leaves);
        // dd($paid_leaves);

        return view('home', compact('divisions', 'departments', 'projects', 'requests', 'paid_leaves', 'attendance_reports'));
    }
}
