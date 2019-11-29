<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use App\ProjectsUsers;
use App\RequestEmployee;
use App\RequestType;
use App\User;
use Illuminate\Http\Request;

class RequestEmployeeController extends Controller
{
    public function index(Request $request)
    {   
        $type = $request['type']; 
        $department = Auth::user()->department;
        if(Auth::user()->role_id == '1') { // for admin role
            $requests = RequestEmployee::all();
            return view('requests.index-admin', compact('requests'));
        } else if(Auth::user()->role_id == '4') { // for department manager role 
            if($type == 'out') {
                $requests = RequestEmployee::where('requestor_id', '=', Auth::user()->id)->get();
                return view('requests.index-department-manager-out', compact('requests'));
            } else {   // request in when type is null or 'in'
                $requests = RequestEmployee::where('requestor_id', '=', Auth::user()->id)->get();
                return view('requests.index-department-manager-in', compact('requests'));
            }
        } else { //for employee role
            $requests = RequestEmployee::where('requestee_id', '=', Auth::user()->id)->get();
            return view('requests.index', compact('requests'));
        }
    }

    public function create()
    {
        $users = User::all();
        $projects = Project::all();
        $types = RequestType::all();
        return view('requests.create', compact('users','projects','types'));
    }

    public function approve_by_manager($id) {
        RequestEmployee::whereId($id)->update(['status_id' => 2, 'reason' => '']);
        return redirect('/request_employees')->with('success', 'Request has been approved by manager');
    }
    
    public function reject_by_manager(Request $request, $id) {
        $reason = $request['reason'];
        RequestEmployee::whereId($id)->update(['status_id' => 3, 'reason' => $reason]);
        return redirect('/request_employees')->with('success', 'Request has been rejected by manager');
    }

    public function approve_by_employee(Request $request, $id) {
        RequestEmployee::whereId($id)->update(['status_id' => 4, 'reason' => '']);
        $request_employee = RequestEmployee::find($id);
        $project_id = $request['project_id'];
        $user_id = $request['user_id'];
        $data = array('project_id' =>$project_id, 'user_id' => $user_id, 'role' => $request_employee->role);
        ProjectsUsers::create($data);
        return redirect('/request_employees')->with('success', 'Request has been approved by employee');
    }
    
    public function reject_by_employee(Request $request, $id) {
        $reason = $request['reason'];
        RequestEmployee::whereId($id)->update(['status_id' => 5, 'reason' => $reason]);
        return redirect('/request_employees')->with('success', 'Request has been rejected by employee');
    }

    public function store(Request $request)
    {
        $requestor_id = Auth::user()->id;
        $status_id = 1;
        $request->request->add(['requestor_id' => $requestor_id, 'status_id' => $status_id]);
        $validatedData = $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'requestor_id' => 'required',
            'requestee_id' => 'required',
            'project_id' => 'required',
            'type_id' => 'required',
            'status_id' => 'required',
            'role' => 'required',
        ]);
        $request_employee = RequestEmployee::create($validatedData);
        return redirect('/request_employees')->with('success', 'Request has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = RequestEmployee::findOrFail($id);
        $project->delete();

        return redirect('/request_employees')->with('success', 'Request has been deleted successfully');
    }
    
}
