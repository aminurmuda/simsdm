<?php

namespace App\Http\Controllers;

use Auth;
use App\Department;
use App\Project;
use App\ProjectsUsers;
use App\RequestEmployee;
use App\RequestType;
use App\User;
use App\Skill;
use App\SkillsUsers;
use App\EmployeeStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class RequestEmployeeController extends Controller
{
    public function index(Request $request)
    {   
        $type = $request['type']; 
        $department = Auth::user()->department;
        if(Auth::user()->role_id == '1') { // for admin role
            $requests = RequestEmployee::all();
            return view('requests.index-admin', compact('requests'));
        } 


        else if(Auth::user()->role_id == '2') { //for employee role
            $requests = RequestEmployee::where('requestee_id', '=', Auth::user()->id)->get();
            return view('requests.index', compact('requests'));
        }

        else if(Auth::user()->role_id == '4') { // for department manager role 
            // dd(Auth::user()->id);
            $managed_department = Department::where('manager_id', Auth::user()->id)->get()->first();
            $managed_department_id = null;
            if($managed_department) {
                $managed_department_id = $managed_department->id;
            } else {
                $managed_department_id = Auth::user()->department->id;
            }

            if($type == 'out') {
                $requests = RequestEmployee::all();
                $requests = array_filter($requests->all(), function($request) use($managed_department_id) {
                    return $request->project->department_id == $managed_department_id;
                });
                return view('requests.index-department-manager-out', compact('requests'));
            } else {   // request in when type is null or 'in'
                $requests = RequestEmployee::all();
                $requests = array_filter($requests->all(), function($request) use($managed_department_id) {
                    return $request->requestee->department_id == $managed_department_id;
                });
                return view('requests.index-department-manager-in', compact('requests'));
            }
        }
        
        else {
            return view('unauthorized');
        }
    }

    public function searchEmployee(Request $request) {
        $skills = Skill::all();
        $statuses = EmployeeStatus::all();
        $status_id = $request['status_id'];
        $skill = $request['skill'];
        $skill_params = explode(";", $skill);

        $managed_department = Department::where('manager_id', Auth::user()->id)->get()->first();
        $managed_department_id = null;
        if($managed_department) {
            $managed_department_id = $managed_department->id;
        } else {
            $managed_department_id = Auth::user()->department->id;
        }
        
        $users = SkillsUsers::with('user')->whereIn('skill_id', $skill_params)->distinct('user_id')->get();
        $users = array_filter($users->all(), function($user) use($status_id) {
            return $user->user->status_id == $status_id;
        });

        $users = Arr::pluck($users, 'user');
        foreach($users as $user) {
            $user->skills = SkillsUsers::with('skill')->where('user_id', $user->id)->get();
        }

        $users = array_filter($users, function($user) use($managed_department_id) {
            return $user->department_id != $managed_department_id;
        });

        $users = array_values($users);

        return response()->json([
            'users' => $users
        ]);
    }

    public function create(Request $request)
    {
        $skills = Skill::all();
        $statuses = EmployeeStatus::all();
        $users = User::all();

        $managed_department = Department::where('manager_id', Auth::user()->id)->get()->first();
        $managed_department_id = null;
        if($managed_department) {
            $managed_department_id = $managed_department->id;
        } else {
            $managed_department_id = Auth::user()->department->id;
        }

        $users = array_filter($users->all(), function($user) use($managed_department_id) {
            return $user->department_id != $managed_department_id;
        });

        $projects = Project::all();
        $types = RequestType::all();
        return view('requests.create', compact('users','projects','types', 'skills', 'statuses'));
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
        $project_id = $request_employee->project_id;
        $user_id = $request_employee->requestee_id;
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

    public function storeRequestEmployees(Request $request) 
    {
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];
        $requestor_id = Auth::user()->id;
        $project_id = $request['project_id'];
        $type_id = $request['type_id'];
        $status_id = 1;
        $selected_employees = $request['selected_employees'];

        try {
            foreach($selected_employees as $employee) {
                $data = array(
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'requestor_id' => $requestor_id,
                    'project_id' => $project_id,
                    'type_id' => $type_id,
                    'status_id' => $status_id,
                    'requestee_id' => $employee['user_id'],
                    'role' => $employee['role']
                );
                RequestEmployee::create($data);
            }
            return response('success', 200);
        } catch (Exception $exception){
             return response($exception->getMessage(), $exception->getStatus());
        }


        // $request->request->add(['requestor_id' => $requestor_id, 'status_id' => $status_id]);
        // $validatedData = $request->validate([
        //     'start_date' => 'required',
        //     'end_date' => 'required',
        //     'requestor_id' => 'required',
        //     'project_id' => 'required',
        //     'type_id' => 'required',
        //     'status_id' => 'required',
        //     'requestee_id' => 'required',
        //     'role' => 'required',
        // ]);
        // $request_employee = RequestEmployee::create($data);
        // return redirect('/request_employees')->with('success', 'Request has been added');
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
