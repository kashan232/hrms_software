<?php

namespace App\Http\Controllers;

use App\Models\EmployeeLeave;
use App\Models\LeaveType;
use App\Models\Manager;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HrManagerController extends Controller
{
    public function hr_add_manager()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $leave_types = LeaveType::all();
            // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('hr_panel.manager.add_manager', [
                'leave_types' => $leave_types,
            ]);
        } else {
            return redirect()->back();
        }

        return view('');
    }
    public function hr_store_manager(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            $managercreae = Manager::create([
                'admin_or_user_id'    => $userId,
                'first_name'          => $request->first_name,
                'last_name'          => $request->last_name,
                'designation'          => $request->designation,
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
    public function hr_all_manager()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $usertype = Auth()->user()->usertype;
            $all_manager = Manager::where('admin_or_user_id', '=', $userId)->where('created_by', '=', $usertype)->get();
            return view('hr_panel.manager.all_manager', [
                'all_manager' => $all_manager,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function hr_edit_manager(Request $request, $id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $leave_types = LeaveType::all();
            $managerdetails = Manager::with('ManagerLeaves')->find($id);

            if (is_null($managerdetails->ManagerLeaves)) {
                $managerdetails->ManagerLeaves = collect(); // Initialize if null
            }

            return view('hr_panel.manager.edit_manager', [
                'managerdetails' => $managerdetails,
                'leave_types' => $leave_types,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function hr_update_manager(Request $request, $id)
    {

        if (Auth::id()) {
            $manager = Manager::find($id);


            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            Manager::where('id', $id)->update([
                'admin_or_user_id'    => $userId,
                'first_name'          => $request->first_name,
                'last_name'          => $request->last_name,
                'designation'          => $request->designation,
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
}
