<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerLeaveTypeController extends Controller
{
    public function manager_all_leavetype()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $LeaveTypes = LeaveType::where('admin_or_user_id', '=', $userId)->get();
            return view('manager_panel.leave_type.manager_leave_type', [
                'LeaveTypes' => $LeaveTypes,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function manager_store_leavetype(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $userType = Auth::user()->usertype; // Assuming the user type is stored in the 'usertype' column
            // dd($userType);

            // Debugging
            // dd($userType);

            LeaveType::create([
                'admin_or_user_id' => $userId,
                'usertype' => $userType, // Adding usertype to the database
                'leave_type' => $request->leave_type,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('Leave-Type-added', 'Leave Type Added Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function manager_update_leavetype(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            // dd($request);
            $update_id = $request->input('leave_type_id');
            $leave_type = $request->input('leave_type');

            LeaveType::where('id', $update_id)->update([
                'leave_type'   => $leave_type,
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('leavetype-update', 'leave Type Updated Successfully');
        } else {
            return redirect()->back();
        }
    }
}
