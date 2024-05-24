<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveRequest;
use App\Models\LeaveType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    public function all_leaverequest()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertypeemail = Auth()->user()->email;
            $employee_details = Employee::where('email', '=', $usertypeemail)->first();
            // dd($employee_details);
            $LeaveTypes = LeaveType::all();
            $LeaveRequests = LeaveRequest::where('admin_or_user_id', '=', $userId)->get();
            $Employees = Employee::where('admin_or_user_id', '=', $userId)->whereNull('deleted_at')->get();
            return view('employee_panel.leave_request.leave_request', [
                'LeaveTypes' => $LeaveTypes,
                'Employees' => $Employees,
                'LeaveRequests' => $LeaveRequests,
                'employee_details' => $employee_details,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function store_leaverequest(Request $request)
    {
        if (Auth::check()) {

            $userId = Auth::id(); // Get the authenticated user's ID
            // Fetch employee details from the authenticated user
            $emp_id = $request->emp_id;
            $userType = Auth::user()->usertype;
            $employee_id = Auth::user()->emp_id;

            $employee = Employee::find($employee_id);


            // Check if employee exists
            if ($employee) {
                // Fetch employee details
                $employeeName = $employee->first_name . ' ' . $employee->last_name;
                $department = $employee->department;
                $designation = $employee->designation;
                // dd($request);

                // Create the leave request with default status as 'Pending'
                LeaveRequest::create([
                    'admin_or_user_id' => $userId,
                    'usertype' =>  $userType,
                    'leave_type' => $request->leave_type,
                    'leave_from_date' => $request->leave_from_date,
                    'leave_to_date' => $request->leave_to_date,
                    'leave_reason' => $request->leave_reason,
                    'Employee' => $employeeName,
                    'department' => $department,
                    'designation' => $designation,
                    'leave_approve' => 'Pending', // Set the default status to "Pending"
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Redirect back with success message
                return redirect()->back()->with('Leave-req-added', 'Leave Request Is Successfully Added');
            } else {
                // Handle case when employee record not found
                return redirect()->back()->with('error', 'Employee record not found.');
            }
        } else {
            return redirect()->back();
        }
    }

    
}
