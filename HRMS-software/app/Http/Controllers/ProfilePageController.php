<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Hr;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePageController extends Controller
{
    public function employee_profile_page()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $emp_id = Auth()->user()->emp_id;

            // dd($userId);
            $all_employee = Employee::where('id', '=', $emp_id)->first();
            // dd($all_employee);

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
            $emp_id = Auth()->user()->emp_id;
            // dd($userId);
            $all_hr = Hr::where('id', '=', $emp_id)->first();
            return view('hr_panel.hr_profile_page', [
                'all_hr' => $all_hr,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function manager_profile_page()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $emp_id = Auth()->user()->emp_id;
            // dd($userId);
            $all_manager = Manager::where('id', '=', $emp_id)->first();
            return view('manager_panel.manager_profile_page', [
                'all_manager' => $all_manager,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
