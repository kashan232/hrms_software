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

    public function employee_profile_picture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $emp_id = Auth::user()->emp_id; // Assuming the employee is logged in
        $employee = Employee::where('id', $emp_id)->firstOrFail();

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('employe_profile'), $filename);

            // Update the employee record with the new profile picture filename
            $employee->emp_pic = $filename;
            $employee->save();

            return back()->with('success', 'Profile picture updated successfully.');
        }

        return back()->with('error', 'Failed to update profile picture.');
    }
}
