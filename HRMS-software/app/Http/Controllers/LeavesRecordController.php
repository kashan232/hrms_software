<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeavesRecordController extends Controller
{
    public function leaves()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_leaves = LeaveRequest::all();
            return view('admin_panel.leaves.leave', [
                'all_leaves' => $all_leaves,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
