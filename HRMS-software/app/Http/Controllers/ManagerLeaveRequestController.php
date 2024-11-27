<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeLeave;
use App\Models\LeaveRequest;
use App\Models\LeaveType;
use App\Models\Manager;
use App\Models\MnagerAttendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerLeaveRequestController extends Controller
{
    public function manager_all_leaverequest()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertypeemail = Auth()->user()->email;
            $employee_details = Manager::where('email', '=', $usertypeemail)->first();
            // dd($employee_details);
            $LeaveTypes = LeaveType::all();
            $LeaveRequests = LeaveRequest::where('admin_or_user_id', '=', $userId)->get();
            $Employees = Manager::where('admin_or_user_id', '=', $userId)->whereNull('deleted_at')->get();
            return view('manager_panel.leave_request.manager_all_leave_request', [
                'LeaveTypes' => $LeaveTypes,
                'Employees' => $Employees,
                'LeaveRequests' => $LeaveRequests,
                'employee_details' => $employee_details,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function manager_store_leaverequest(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id(); // Get the authenticated user's ID
            $userType = Auth::user()->usertype; // Get user type
            $manager_id = Auth::user()->emp_id; // Get Manager's employee ID

            // Find the manager record
            $employee = Manager::find($manager_id);

            // Get the number of leave days requested by the manager
            $take_leave = intval($request->take_leave); // Leave days requested

            if ($employee) {
                // Check if the manager has sufficient leave balance
                $employee_leave = EmployeeLeave::where('employee_id', $manager_id)
                    ->where('leave_type_id', $request->leave_type)
                    ->where('usertype', 'manager') // Ensure it's a manager leave type
                    ->first();

                if ($employee_leave && $employee_leave->leave_quota >= $take_leave) {
                    // Create the leave request
                    LeaveRequest::create([
                        'admin_or_user_id' => $userId, // Admin or user ID for leave request
                        'userid' => $manager_id, // Store manager's employee ID
                        'usertype' => $userType,
                        'leave_type' => $request->leave_type,
                        'leave_from_date' => $request->leave_from_date,
                        'leave_to_date' => $request->leave_to_date,
                        'star_time' => $request->star_time,
                        'end_time' => $request->end_time,
                        'leave_reason' => $request->leave_reason,
                        'employee' => $employee->first_name . ' ' . $employee->last_name, // Manager's full name
                        'department' => $employee->department, // Manager's department
                        'designation' => $employee->designation, // Manager's designation
                        'leave_approve' => 'Pending', // Default leave status
                        'leave_days' => $take_leave, // Store the leave days
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    // Deduct the leave days from the manager's leave balance
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
                // Handle case when manager record is not found
                return redirect()->back()->with('error', 'Manager record not found.');
            }
        } else {
            return redirect()->back();
        }
    }


    // public function manager_store_leaverequest(Request $request)
    // {
    //     if (Auth::id()) {
    //         $usertype = Auth()->user()->usertype;
    //         $userId = Auth::id();
    //         LeaveRequest::create([
    //             'admin_or_user_id'    => $userId,
    //             'leave_type'          => $request->leave_type,
    //             'leave_from_date'          => $request->leave_from_date,
    //             'leave_to_date'          => $request->leave_to_date,
    //             'leave_reason'          => $request->leave_reason,
    //             'created_at'        => Carbon::now(),
    //             'updated_at'        => Carbon::now(),
    //         ]);
    //         return redirect()->back()->with('Leave-req-added', 'Leave Request Is Successfully');
    //     } else {
    //         return redirect()->back();
    //     }
    // }

    public function mark_leave_mngr(Request $request)
    {
        // Validate the request
        $request->validate([
            'leave_id' => 'required|exists:leave_requests,id',
        ]);

        // Find the leave request
        $leaveRequest = LeaveRequest::find($request->leave_id);

        // Ensure the leave is approved
        if ($leaveRequest->leave_approve !== 'Approve') {
            return response()->json(['message' => 'Only approved leaves can be marked!'], 400);
        }

        // Get authenticated HR details
        $hr_id = Auth::user()->emp_id;
        $name = Auth::user()->name;

        // Retrieve HR details
        $Managerdetails = Manager::where('id', $hr_id)->first();

        if (!$Managerdetails) {
            return response()->json(['message' => 'Manager details not found!'], 404);
        }

        // Mark the leave in the HR attendance table
        MnagerAttendance::updateOrCreate(
            [
                'employee_attendance_date' => $leaveRequest->leave_from_date, // Attendance date from leave request
                'department' => $Managerdetails->department, // HR's department
                'job_designation' => $Managerdetails->designation, // HR's designation
            ],
            [
                'usertype' => 'Manager', // HR type
                'emp_id' => $hr_id, // HR ID from authentication
                'emp_name' => $name, // HR name from authentication
                'employee_attendance' => 'Leave', // Marking attendance as "Leave"
                'start_time' => null, // No start time for leave
                'end_time' => null, // No end time for leave
            ]
        );

        // Return success response
        return response()->json(['message' => 'Leave successfully marked!']);
    }
}
