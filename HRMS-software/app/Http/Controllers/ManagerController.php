<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\EmployeeLeave;
use App\Models\Hr;
use App\Models\LeaveType;
use App\Models\Manager;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class ManagerController extends Controller
{
    public function add_manager()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $leave_types = LeaveType::all();
            $all_department = Department::where('admin_or_user_id', '=', $userId)->get();

            // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.manager.add_manager', [
                // 'all_department' => $all_department,
                'leave_types' => $leave_types,
                'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function store_manager(Request $request)
    {
        if (Auth::id()) {

            
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:hrs,email|unique:users,email',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator) // Errors will be passed
                    ->withInput(); // Retain the old input
            }

            $managercreae = Manager::create([
                'admin_or_user_id'    => $userId,
                'department'          => $request->department,
                'designation'          => $request->designation,
                'first_name'          => $request->first_name,
                'last_name'          => $request->last_name,
                'phone'          => $request->phone,
                'email'          => $request->email,
                'joining_date'          => $request->joining_date,
                'decided_salary'          => $request->decided_salary,
                'manager_status'          => $request->manager_status,
                'address'          => $request->address,
                'manager_gender'          => $request->manager_gender,
                'user_name'          => $request->user_name,
                'password'          => $request->password,
                'created_by'          => $usertype,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);

            // Create a user record with the same credentials and usertype 'employee'
            $user = User::create([
                'name' => $request->first_name . ' ' . $request->last_name,
                'emp_id' => $managercreae->id, // Set the emp_id to the newly created employee's id
                'email' => $request->email,
                'password' => bcrypt($request->password), // Make sure to hash the password
                'usertype' => 'manager', // Set the usertype to 'employee'
            ]);

            // Store multiple leave types for the employee
            if ($request->has('leave_type_ids')) {
                foreach ($request->leave_type_ids as $index => $leave_type_id) {
                    $leave_quota = $request->leave_quotas[$index];
                    EmployeeLeave::create([
                        'employee_id' => $managercreae->id,
                        'leave_type_id' => $leave_type_id,
                        'leave_quota' => $leave_quota,
                        'usertype' => 'manager',
                    ]);
                }
            }


            return redirect()->back()->with('manager-added', 'Manager Added Successfully');
        } else {
            return redirect()->back();
        }
    }
    public function all_manager()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_manager = Manager::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.manager.all_manager', [
                'all_manager' => $all_manager,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function allhr_manager()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_manager = Manager::where('created_by', '=', 'hr')->get();
            return view('admin_panel.manager.allhr_manager', [
                'all_manager' => $all_manager,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function edit_manager(Request $request, $id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $leave_types = LeaveType::all();
            $managerdetails = Manager::with('ManagerLeaves')->find($id);

            if (is_null($managerdetails->ManagerLeaves)) {
                $managerdetails->ManagerLeaves = collect(); // Initialize if null
            }
            $all_department = Department::where('admin_or_user_id', '=', $userId)->get();


            return view('admin_panel.manager.edit_manager', [
                'managerdetails' => $managerdetails,
                'leave_types' => $leave_types,
                'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function update_manager(Request $request, $id)
    {

        if (Auth::id()) {
            $manager = Manager::find($id);


            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            Manager::where('id', $id)->update([
                'admin_or_user_id'    => $userId,
                'department'          => $request->department,
                'designation'          => $request->designation,
                'first_name'          => $request->first_name,
                'last_name'          => $request->last_name,
                'phone'          => $request->phone,
                'email'          => $request->email,
                'joining_date'          => $request->joining_date,
                'decided_salary'          => $request->decided_salary,
                'manager_status'          => $request->manager_status,
                'address'          => $request->address,
                'manager_gender'          => $request->manager_gender,
                'user_name'          => $request->user_name,
                'created_by'          => $usertype,
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
                            'employee_id' => $manager->id,
                            'leave_type_id' => $leave_type_id,
                        ],
                        [
                            'leave_quota' => $leave_quota,
                            'usertype' => 'manager',
                        ]
                    );
                }
            }


            return Redirect()->back()->with('success-message-updte', 'Manager Updated successfully!');
        } else {
            return redirect()->back();
        }
    }

    public function manager_Change_Password()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('manager_panel.manager_change_password', [
                // 'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function manager_updte_change_Password(Request $request)
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
            $manager = Manager::where('id', $user->emp_id)->first();
            if ($manager) {
                $manager->password = $request->new_password;  // No hashing for the manager table password
                $manager->save();
            } else {
                return back()->with('error', 'manager record not found.');
            }

            return back()->with('success', 'Password changed successfully.');
        } else {
            return redirect()->back();
        }
    }
}
