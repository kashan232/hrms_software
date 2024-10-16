<?php

namespace App\Http\Controllers;

use App\Models\EmployeeLeave;
use App\Models\Hr;
use App\Models\LeaveRequest;
use App\Models\LeaveType;
use App\Models\Manager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HRLeaveRequestController extends Controller
{
    public function hr_all_leaverequest()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertypeemail = Auth()->user()->email;
            $employee_details = Hr::where('email', '=', $usertypeemail)->first();
            // dd($employee_details);
            $LeaveTypes = LeaveType::all();
            $LeaveRequests = LeaveRequest::where('admin_or_user_id', '=', $userId)->get();
            $Employees = Hr::where('admin_or_user_id', '=', $userId)->whereNull('deleted_at')->get();
            return view('hr_panel.leave_request.hr_leave_request', [
                'LeaveTypes' => $LeaveTypes,
                'Employees' => $Employees,
                'LeaveRequests' => $LeaveRequests,
                'employee_details' => $employee_details,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function hr_store_leaverequest(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id(); // Get the authenticated user's ID
            $userType = Auth::user()->usertype; // Get user type
            $hr_id = Auth::user()->emp_id; // Get HR employee ID

            // Find the HR record
            $employee = Hr::find($hr_id);

            // Get the number of leave days requested by the HR employee
            $take_leave = intval($request->take_leave); // Leave days requested

            if ($employee) {
                // Check if the HR employee has sufficient leave balance
                $employee_leave = EmployeeLeave::where('employee_id', $hr_id)
                    ->where('leave_type_id', $request->leave_type)
                    ->where('usertype', 'hr')
                    ->first();

                if ($employee_leave && $employee_leave->leave_quota >= $take_leave) {
                    // Create the leave request
                    LeaveRequest::create([
                        'admin_or_user_id' => $userId, // Admin or user ID for leave request
                        'usertype' => $userType,
                        'leave_type' => $request->leave_type,
                        'leave_from_date' => $request->leave_from_date,
                        'leave_to_date' => $request->leave_to_date,
                        'star_time' => $request->star_time,
                        'end_time' => $request->end_time,
                        'leave_reason' => $request->leave_reason,
                        'employee' => $employee->first_name . ' ' . $employee->last_name, // HR employee's full name
                        'department' => $employee->department, // HR employee's department
                        'designation' => $employee->designation, // HR employee's designation
                        'leave_approve' => 'Pending', // Default leave status
                        'leave_days' => $take_leave, // Store the leave days
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    // Deduct the leave days from the HR employee's leave balance
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
                // Handle case when HR employee record is not found
                return redirect()->back()->with('error', 'HR record not found.');
            }
        } else {
            return redirect()->back();
        }
    }
}
