<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLeaveApproveController extends Controller
{
    public function admin_all_leave()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $usertype = $user->usertype;
            $name = $user->name;
            // dd($name);

            $all_leaves = LeaveRequest::whereIn('designation', ['HR', 'manager'])->get();

            return view('admin_panel.all_leave.admin_all_leave', [
                'all_leaves' => $all_leaves,
                'usertype' => $usertype,
                'name' => $name,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function admin_pending_leave()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $usertype = $user->usertype;
            $name = $user->name;

            $pending_leaves = LeaveRequest::where('leave_approve', 'pending')
                ->whereIn('designation', ['HR', 'manager'])
                ->get();

            return view('admin_panel.all_leave.admin_pending_leave', [
                'pending_leaves' => $pending_leaves,
                'usertype' => $usertype,
                'name' => $name,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function admin_approve_leave()
    {
        // Only fetch approved leave requests where designation is 'HR' or 'manager'
        $approve_leaves = LeaveRequest::where('leave_approve', 'Approve')
            ->whereIn('designation', ['HR', 'manager'])
            ->get();
        return view('admin_panel.all_leave.admin_approve_leave', [
            'approve_leaves' => $approve_leaves,
        ]);
    }
    public function admin_reject_leave()
    {
        // Only fetch rejected leave requests where designation is 'HR' or 'manager'
        $reject_leaves = LeaveRequest::where('leave_approve', 'Reject')
            ->whereIn('designation', ['HR', 'manager'])
            ->get();
        return view('admin_panel.all_leave.admin_reject_leave', [
            'reject_leaves' => $reject_leaves,
        ]);
    }
    public function admin_updateLeaveApprove(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $usertype = $user->usertype;
            $name = $user->name;

            $leaveId = $request->input('leave_id');
            $status = $request->input('status');
            // dd($status);
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
            return redirect()->back();
        }
    }
}
