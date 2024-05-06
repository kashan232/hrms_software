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
            // dd($userId);
            $LeaveTypes = LeaveType::where('admin_or_user_id', '=', $userId)->get();
            $LeaveRequests = LeaveRequest::where('admin_or_user_id', '=', $userId)->get();
            $Employees = Employee::where('admin_or_user_id', '=', $userId)->whereNull('deleted_at')->get();
            return view('admin_panel.leave_request.leave_request', [
                'LeaveTypes' => $LeaveTypes,
                'Employees' => $Employees,
                'LeaveRequests' => $LeaveRequests,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_leaverequest(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            LeaveRequest::create([
                'admin_or_user_id'    => $userId,
                'department'          => $request->department,
                'designation'          => $request->designation,
                'Employee'          => $request->Employee,
                'leave_type'          => $request->leave_type,
                'leave_from_date'          => $request->leave_from_date,
                'leave_to_date'          => $request->leave_to_date,
                'leave_reason'          => $request->leave_reason,
                'leave_approve'          => $request->leave_approve,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
            return redirect()->back()->with('Leave-req-added', 'Leave Request Is Successfully');
        } else {
            return redirect()->back();
        }
    }
}
