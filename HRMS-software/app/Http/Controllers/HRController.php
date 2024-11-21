<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\EmployeeLeave;
use App\Models\Hr;
use App\Models\LeaveType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class HRController extends Controller
{
    public function add_hr()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            $leave_types = LeaveType::all();
            // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.HR.add_hr', [ // 'all_department' => $all_department,
                'leave_types' => $leave_types,
                'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_hr(Request $request)
    {
        if (Auth::id()) {
            // Validation for input fields
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:hrs,email|unique:users,email',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator) // Errors will be passed
                    ->withInput(); // Retain the old input
            }

            $userId = Auth::id();
            $hrcreate = Hr::create([
                'admin_or_user_id'    => $userId,
                'department'          => $request->department,
                'designation'          => $request->designation,
                'first_name'          => $request->first_name,
                'last_name'          => $request->last_name,
                'phone'               => $request->phone,
                'email'               => $request->email,
                'joining_date'        => $request->joining_date,
                'decided_salary'      => $request->decided_salary,
                'hr_status'           => $request->hr_status,
                'address'             => $request->address,
                'hr_gender'           => $request->hr_gender,
                'user_name'           => $request->user_name,
                'password'            => bcrypt($request->password), // Securely hash the password
                'nummbr_of_leave'     => $request->nummbr_of_leave,
                'created_at'          => Carbon::now(),
                'updated_at'          => Carbon::now(),
            ]);

            $user = User::create([
                'name'     => $request->first_name . ' ' . $request->last_name,
                'emp_id'   => $hrcreate->id,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
                'usertype' => 'hr',
            ]);

            if ($request->has('leave_type_ids')) {
                foreach ($request->leave_type_ids as $index => $leave_type_id) {
                    $leave_quota = $request->leave_quotas[$index];
                    EmployeeLeave::create([
                        'employee_id' => $hrcreate->id,
                        'leave_type_id' => $leave_type_id,
                        'leave_quota' => $leave_quota,
                        'usertype' => 'hr',
                    ]);
                }
            }

            return redirect()->back()->with('hr-added', 'HR Added Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function all_hr()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_hr = Hr::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.HR.all_hr', [
                'all_hr' => $all_hr,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function edit_hr(Request $request, $id)
    {
        if (Auth::id()) {
            $userId = Auth::id();

            // Fetch all available leave types
            $leave_types = LeaveType::all();

            // Find HR details with leave entries
            $hrdetails = Hr::with('leaveEntries')->find($id);
            $all_department = Department::where('admin_or_user_id', '=', $userId)->get();

            // If leave entries are null, make it an empty collection
            if (is_null($hrdetails->leaveEntries)) {
                $hrdetails->leaveEntries = collect();
            }

            // Return view with HR details and leave types
            return view('admin_panel.HR.edit_hr', [
                'hrdetails' => $hrdetails,
                'leave_types' => $leave_types,
                'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function update_hr(Request $request, $id)
    {

        if (Auth::id()) {
            $hr = Hr::find($id);
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            Hr::where('id', $id)->update([
                'admin_or_user_id'    => $userId,
                'department'          => $request->department,
                'designation'          => $request->designation,
                'first_name'          => $request->first_name,
                'last_name'          => $request->last_name,
                'phone'          => $request->phone,
                'email'          => $request->email,
                'joining_date'          => $request->joining_date,
                'decided_salary'          => $request->decided_salary,
                'hr_status'          => $request->hr_status,
                'address'          => $request->address,
                'hr_gender'          => $request->hr_gender,
                'user_name'          => $request->user_name,
                'nummbr_of_leave'          => $request->nummbr_of_leave,
                'updated_at' => Carbon::now(),
            ]);

            // Handle leave types and quotas
            if ($request->has('leave_type_ids') && $request->has('leave_quotas')) {
                // dd($request->leave_type_ids, $request->leave_quotas);
                // Loop through the leave types and quotas
                foreach ($request->leave_type_ids as $key => $leave_type_id) {
                    $leave_quota = $request->leave_quotas[$key];

                    // Assuming you have a Leave model to save employee leave details
                    EmployeeLeave::updateOrCreate(
                        [
                            'employee_id' => $hr->id,
                            'leave_type_id' => $leave_type_id,
                        ],
                        [
                            'leave_quota' => $leave_quota,
                            'usertype' => 'hr',
                        ]
                    );
                }
            }


            return Redirect()->back()->with('success-message-updte', 'HR Updated successfully!');
        } else {
            return redirect()->back();
        }
    }

    public function hr_Change_Password()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('hr_panel.hr_change_password', [
                // 'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function hr_updte_change_Password(Request $request)
    {
        if (Auth::id()) {
            // dd($request)
            // Validate the request data
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|min:8',
                'retype_new_password' => 'required|same:new_password'
            ]);

            // Get the currently authenticated user
            $user = Auth::user();
            // dd($user);
            // Check if the old password matches the current password
            if (!Hash::check($request->old_password, $user->password)) {
                return back()->with('error', 'The provided old password does not match our records.');
            }

            // Update password in the users table
            $user->password = Hash::make($request->new_password);
            $user->save();

            // Update password in the hr table
            $hr = Hr::where('id', $user->emp_id)->first();
            if ($hr) {
                $hr->password = $request->new_password;  // No hashing for the hr table password
                $hr->save();
            } else {
                return back()->with('error', 'HR record not found.');
            }

            return back()->with('success', 'Password changed successfully.');
        } else {
            return redirect()->back();
        }
    }

    // public function add_admin()
    // {
    //     if (Auth::id()) {
    //         $userId = Auth::id();
    //         // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
    //         return view('admin_panel.admin.add_admin', [
    //             // 'all_department' => $all_department,
    //         ]);
    //     } else {
    //         return redirect()->back();
    //     }

    //     return view('');
    // }
    // public function store_admin(Request $request)
    // {
    //     if (Auth::id()) {
    //         $user = User::create([
    //             'name' => $request->first_name . ' ' . $request->last_name,
    //             'email' => $request->email,
    //             'password' => bcrypt($request->password), // Make sure to hash the password
    //             'usertype' => 'admin', // Set the usertype to 'employee'
    //         ]);

    //         return redirect()->back()->with('admin-added', 'Admin is Added Successfully');
    //     } else {
    //         return redirect()->back();
    //     }
    // }
    // public function all_admin()
    // {
    //     if (Auth::id()) {

    //         $admins = User::where('usertype', '=', 'admin')->get();
    //         return view('admin_panel.admin.all_admin', [
    //             'admins' => $admins,
    //         ]);
    //     } else {
    //         return redirect()->back();
    //     }
    // }
}
