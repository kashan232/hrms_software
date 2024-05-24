<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Hr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePageController extends Controller
{
    public function employee_profile_page()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_employee = Employee::all();
            return view('employee_panel.employee_profile_page', [
                'all_employee' => $all_employee,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function hr_profile_page()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_hr = Hr::where('admin_or_user_id', '=', $userId)->get();
            return view('hr_panel.hr_profile_page', [
                'all_hr' => $all_hr,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
