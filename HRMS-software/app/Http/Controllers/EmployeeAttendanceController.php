<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeAttendanceController extends Controller
{
    public function all_attendance()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $all_employee = Employee::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.attendance.all_attendance', [
                // 'all_employee' => $all_employee,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function add_attendance()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $all_employee = Employee::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.attendance.add_attendance', [
                // 'all_employee' => $all_employee,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
