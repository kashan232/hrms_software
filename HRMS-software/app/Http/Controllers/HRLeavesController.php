<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HRLeavesController extends Controller
{
    public function all_leave()
    {
        if (Auth::id()) {
            $userId = Auth::id();

            // Adjusting the query to exclude HR designations
            $all_leaves = LeaveRequest::where('designation', '!=', 'HR')->get();

            return view('hr_panel.all_leave.all_leave', [
                'all_leaves' => $all_leaves,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function pending_leave()
    {
        $pending_leaves = LeaveRequest::where('leave_approve', 'pending')
            ->where('designation', '!=', 'HR')
            ->get();
        return view('hr_panel.all_leave.pending_leave', [
            'pending_leaves' => $pending_leaves,
        ]);
    }
    public function approve_leave()
    {
        $approve_leaves = LeaveRequest::where('leave_approve', 'Approve')
        ->where('designation', '!=', 'HR')
        ->get();
        return view('hr_panel.all_leave.approve_leave', [
            'approve_leaves' => $approve_leaves,
        ]);
    }
    public function reject_leave()
    {
        $reject_leaves = LeaveRequest::where('leave_approve', 'Reject')
        ->where('designation', '!=', 'HR')
        ->get();
        return view('hr_panel.all_leave.reject_leave', [
            'reject_leaves' => $reject_leaves,
        ]);
    }
    public function updateLeaveApprove(Request $request)
{
    if (Auth::check()) {
        $user = Auth::user();
        $usertype = $user->usertype;
        $name = $user->name;

        $leaveId = $request->input('leave_id');
        $status = $request->input('status');

        // Find the leave request by ID
        $leaveRequest = LeaveRequest::find($leaveId);

        // Update the leave_approve, approved_by, and user_name fields
        if ($leaveRequest) {
            $leaveRequest->leave_approve = $status;
            $leaveRequest->approved_by = $usertype;
            $leaveRequest->user_name = $name;
            $leaveRequest->save();

            return response()->json(['success' => true, 'message' => 'Leave request status updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Leave request not found'], 404);
        }
    } else {
        return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
    }
}

}
