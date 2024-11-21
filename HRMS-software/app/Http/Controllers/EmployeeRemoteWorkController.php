<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeRemoteWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeRemoteWorkController extends Controller
{
    public function add_employee_remote_work()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('employee_panel.remote_work.add_remote', [
                // 'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }
    }

   

    //     public function store_remote_work(Request $request)
    // {
    //     if (Auth::check()) {
    //         $user = Auth::user(); // Get the authenticated user

    //         // Create the remote work record with employee details


    //         return redirect()->back()->with('Remote-work-added', 'Remote Work Added Successfully');
    //     } else {
    //         return redirect()->back()->with('error', 'User not authenticated');
    //     }
    // }


    public function store_remote_work(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::id(); // Get the authenticated user's ID
            $emp_email = Auth()->user()->email;
            // dd($emp_email);
            // dd($user);

            // Fetch employee details from the authenticated user
            $employee = Employee::where('email', $emp_email)->first();
            // dd($employee);


            // Check if employee exists
            if ($employee) {
                // Fetch employee details
                $employeeName = $employee->first_name . ' ' . $employee->last_name;
                // dd($employeeName);
                $department = $employee->department;
                $designation = $employee->designation;

                // Create the leave request with default status as 'Pending'
                $remoteWork = EmployeeRemoteWork::create([
                    'admin_or_user_id' => $user,
                    'job_type' => $request->job_type,
                    'date' => $request->date,
                    'time' => $request->time,
                    'task' => $request->task,
                    'approval' => $request->approval,
                    'employee' => $employeeName,
                    'department' => $department,
                    'designation' => $designation,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Redirect back with success message
                return redirect()->back()->with('remote-work', ' Remote Employee  Is Successfully Added');
            } else {
                // Handle case when employee record not found
                return redirect()->back()->with('error', 'Remote Work not found.');
            }
        } else {
            return redirect()->back();
        }
    }


    public function all_employee_remote_work()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_remote = EmployeeRemoteWork::where('admin_or_user_id', '=', $userId)->get();
            return view('employee_panel.remote_work.all_remote', [
                'all_remote' => $all_remote,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
