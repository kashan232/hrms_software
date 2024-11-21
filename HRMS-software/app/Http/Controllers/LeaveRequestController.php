<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeLeave;
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
            $userId = Auth::id();
            $userType = Auth::user()->usertype;
            $employee_id = Auth::user()->emp_id;

            // Find the employee record
            $employee = Employee::find($employee_id);

            // Get the number of leave days requested by the employee
            $take_leave = intval($request->take_leave); // Leave days requested

            if ($employee) {
                // Check if the employee has sufficient leave balance
                $employee_leave = EmployeeLeave::where('employee_id', $employee_id)
                    ->where('leave_type_id', $request->leave_type)
                    ->first();

                if ($employee_leave && $employee_leave->leave_quota >= $take_leave) {
                    // Create the leave request
                    LeaveRequest::create([
                        'admin_or_user_id' => $userId,
                        'usertype' => $userType,
                        'leave_type' => $request->leave_type,
                        'leave_from_date' => $request->leave_from_date,
                        'leave_to_date' => $request->leave_to_date,
                        'star_time' => $request->star_time,
                        'end_time' => $request->end_time,
                        'leave_reason' => $request->leave_reason,
                        'employee' => $employee->first_name . ' ' . $employee->last_name,
                        'department' => $employee->department,
                        'designation' => $employee->designation,
                        'leave_approve' => 'Pending',
                        'leave_days' => $take_leave, // Store the leave days from the form input
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    // Deduct the leave days from the employee's leave balance
                    $new_leave_balance = $employee_leave->leave_quota - $take_leave;
                    $employee_leave->update([
                        'leave_quota' => $new_leave_balance,
                    ]);

                    // Redirect with success message
                    return redirect()->back()->with('Leave-req-added', 'Leave Request Is Successfully Added');
                } else {
                    // Handle insufficient leave balance
                    return redirect()->back()->with('error', 'Insufficient leave balance.');
                }
            } else {
                // Handle case when employee record not found
                return redirect()->back()->with('error', 'Employee record not found.');
            }
        } else {
            return redirect()->back();
        }
    }


    public function getLeaveBalance(Request $request)
    {
        $emp_id = $request->emp_id;
        $leave_type = $request->leave_type;

        // Fetch the leave details for the employee
        $employee_leave = EmployeeLeave::where('employee_id', $emp_id)
            ->where('leave_type_id', $leave_type)  // Match the leave type
            ->where('usertype', 'employee')        // Ensure it's for the 'employee' user type
            ->first();

        if ($employee_leave) {
            // Return leave balance if found
            return response()->json(['leave_balance' => $employee_leave->leave_quota]);
        } else {
            // If no record found, return 0 as default leave balance
            return response()->json(['leave_balance' => 0]);
        }
    }

    public function get_leave_balance_hr(Request $request)
    {
        $emp_id = $request->emp_id;
        $leave_type = $request->leave_type;

        // Fetch the leave details for the employee
        $employee_leave = EmployeeLeave::where('employee_id', $emp_id)
            ->where('leave_type_id', $leave_type)  // Match the leave type
            ->where('usertype', 'hr')        // Ensure it's for the 'employee' user type
            ->first();

        if ($employee_leave) {
            // Return leave balance if found
            return response()->json(['leave_balance' => $employee_leave->leave_quota]);
        } else {
            // If no record found, return 0 as default leave balance
            return response()->json(['leave_balance' => 0]);
        }
    }

    public function get_leave_balance_manager(Request $request)
    {
        $emp_id = $request->emp_id;
        $leave_type = $request->leave_type;

        // Fetch the leave details for the employee
        $employee_leave = EmployeeLeave::where('employee_id', $emp_id)
            ->where('leave_type_id', $leave_type)  // Match the leave type
            ->where('usertype', 'manager')        // Ensure it's for the 'employee' user type
            ->first();

        if ($employee_leave) {
            // Return leave balance if found
            return response()->json(['leave_balance' => $employee_leave->leave_quota]);
        } else {
            // If no record found, return 0 as default leave balance
            return response()->json(['leave_balance' => 0]);
        }
    }

}
