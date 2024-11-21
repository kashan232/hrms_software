<?php

namespace App\Http\Controllers;

use App\Models\EmployeeRemoteWork;
use App\Models\Expense;
use App\Models\Hiring;
use App\Models\LeaveRequest;
use App\Models\LeaveType;
use App\Models\Revenue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Schema\Expect;

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
    public function remote_emp_list()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_remote = EmployeeRemoteWork::all();
            return view('admin_panel.remote_employee.remote_emp_list', [
                'all_remote' => $all_remote,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function hiring_listing()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_hiring = Hiring::all();
            return view('admin_panel.hiring.hiring_listing', [
                'all_hiring' => $all_hiring,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function expense_listing()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_expense = Expense::all();
            return view('admin_panel.expense.expense_listing', [
                'all_expense' => $all_expense,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function revenue_listing()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_revenue = Revenue::all();
            return view('admin_panel.revenue.revenue_listing', [
                'all_revenue' => $all_revenue,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
