<?php

namespace App\Http\Controllers;

use Auth;
use App\PaidLeave;
use App\User;
use Illuminate\Http\Request;

class PaidLeaveController extends Controller
{
    public function index() {
        $paid_leaves = PaidLeave::all();
        return view('paid_leaves.index', compact('paid_leaves'));
    }
    
    public function create() {
        $users = User::all();
        return view('paid_leaves.create', compact('users'));
    }

    public function store(Request $request) {
        $user_id = Auth::user()->id;
        $status_id = 1;
        $type_id = 1;
        $request->request->add(['user_id' => $user_id, 'status_id' => $status_id, 'type_id' => $type_id]);
        $validatedData = $request->validate([
            'user_id' => 'required',
            'status_id' => 'required',
            'type_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'reason' => 'required|max:255',
        ]);
        $paid_leave = PaidLeave::create($validatedData);
        return redirect('/paid_leaves')->with('success', 'Paid Leave has been added');
    }

    public function paid_leave_approve_by_manager($id) {
        PaidLeave::whereId($id)->update(['status_id' => 2]);
        return redirect('/paid_leaves')->with('success', 'Request has been approved by manager');
    }
    
    public function paid_leave_reject_by_manager(Request $request, $id) {
        $reject_reason = $request['reject_reason'];
        PaidLeave::whereId($id)->update(['status_id' => 3, 'reject_reason' => $reject_reason]);
        return redirect('/paid_leaves')->with('success', 'Request has been rejected by manager');
    }

    public function show($id) {
        $paid_leave = PaidLeave::findOrFail($id);
        return view('paid_leaves.show', compact('paid_leave'));
    }

    public function destroy($id) {
        $paid_leave = PaidLeave::findOrFail($id);
        $paid_leave->delete();

        return redirect('/paid_leaves')->with('success', 'Paid Leave has been deleted successfully');
    }
}
