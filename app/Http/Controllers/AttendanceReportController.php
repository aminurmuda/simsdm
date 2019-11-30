<?php

namespace App\Http\Controllers;

use Auth;
use App\AttendanceReport;
use App\User;
use App\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceReportController extends Controller
{
    public function index() {
        $attendance_reports = null;
        if(Auth::user()->role_id == '1') {
            $attendance_reports = AttendanceReport::all();
            return view('attendance_reports.index-admin', compact('attendance_reports'));
        } 
        
        else if(Auth::user()->role_id == '2') {
            $attendance_reports = AttendanceReport::where('user_id', '=', Auth::user()->id)->get();
            return view('attendance_reports.index', compact('attendance_reports'));
        }
        
        else if(Auth::user()->role_id == '5') {
            $attendance_reports = AttendanceReport::all();
            return view('attendance_reports.index-project-manager', compact('attendance_reports'));
        }

        else {
            return view('unauthorized');
        }
    }
    
    public function create() {
        $projects = Project::all();
        return view('attendance_reports.create', compact('projects'));
    }

    public function store(Request $request) {
        $user_id = Auth::user()->id;
        $status_id = 1; // Status == 'Dibuat'
        $date = Carbon::now()->toDateString();
        $request->request->add(['user_id' => $user_id, 'status_id' => $status_id, 'date' => $date]);
        $validatedData = $request->validate([
            'user_id' => 'required',
            'project_id' => 'required',
            'date' => 'required',
            'clock_in' => 'nullable',
            'clock_out' => 'nullable',
            'clock_in_note' => 'nullable',
            'clock_out_note' => 'nullable',
            'status_id' => 'required',
        ]);
        $attendance_report = AttendanceReport::create($validatedData);
        return redirect('/attendance_reports')->with('success', 'AttendanceReport has been added');
    }

    public function approve($id) {
        AttendanceReport::whereId($id)->update(['status_id' => 2]);
        return redirect('/attendance_reports')->with('success', 'AttendanceReport has been approved');
    }
    
    public function reject($id) {
        AttendanceReport::whereId($id)->update(['status_id' => 3]);
        return redirect('/attendance_reports')->with('success', 'AttendanceReport has been rejected');
    }

    public function destroy($id) {
        $attendance_report = AttendanceReport::findOrFail($id);
        $attendance_report->delete();

        return redirect('/attendance_reports')->with('success', 'AttendanceReport has been deleted successfully');
    }
}
