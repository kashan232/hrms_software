<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\EmployeeLeave;
use App\Models\LeaveType;
use App\Models\Manager;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class EmployeeController extends Controller
{
    public function all_employee()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_employee = Employee::all();
            return view('admin_panel.employees.all_employee', [
                'all_employee' => $all_employee,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function allhr_employee()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            // dd($userId);
            $all_employee = Employee::where('create_by', '=', 'hr')->get();
            return view('admin_panel.employees.allhr_employee', [
                'all_employee' => $all_employee,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function add_employee()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            $all_managers = Manager::where('admin_or_user_id', '=', $userId)->get();
            $leave_types = LeaveType::all();
            // dd($all_managers);
            return view('admin_panel.employees.add_employee', [
                'all_department' => $all_department,
                'all_managers' => $all_managers,
                'leave_types' => $leave_types,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function store_employee(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // Create the employee record
            $usertype = Auth()->user()->usertype;
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:hrs,email|unique:users,email',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator) // Errors will be passed
                    ->withInput(); // Retain the old input
            }

            $employee = Employee::create([
                'admin_or_user_id' => $userId,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'joining_date' => $request->joining_date,
                'phone' => $request->phone,
                'department' => $request->department,
                'designation' => $request->designation,
                'decided_salary' => $request->decided_salary,
                'reporting_manager' => $request->reporting_manager,
                'employee_status' => $request->employee_status,
                'address' => $request->address,
                'employee_gender' => $request->employee_gender,
                'number_of_leaves' => $request->number_of_leaves,
                'username' => $request->username,
                'password' => $request->password,
                'create_by' => $usertype,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Create a user record with the same credentials and usertype 'employee'
            $user = User::create([
                'name' => $request->first_name . ' ' . $request->last_name,
                'emp_id' => $employee->id, // Set the emp_id to the newly created employee's id
                'email' => $request->email,
                'password' => bcrypt($request->password), // Make sure to hash the password
                'usertype' => 'employee', // Set the usertype to 'employee'

            ]);

            // Store multiple leave types for the employee
            if ($request->has('leave_type_ids')) {
                foreach ($request->leave_type_ids as $index => $leave_type_id) {
                    $leave_quota = $request->leave_quotas[$index];
                    EmployeeLeave::create([
                        'employee_id' => $employee->id,
                        'leave_type_id' => $leave_type_id,
                        'leave_quota' => $leave_quota,
                        'usertype' => 'employee',
                    ]);
                }
            }


            return redirect()->back()->with('Employee-added', 'Employee Created Successfully');
        } else {
            return redirect()->back();
        }
    }
    public function delete_employee(Request $request, $id)
    {
        $delete = Employee::find($id)->delete();
        return redirect()->back()->with('delete-message', 'Employee Has Been Deleted Successsfully');
    }
    public function edit_employee(Request $request, $id)
    {
        if (Auth::id()) {
            $userId = Auth::id();

            // Get all departments associated with the user
            $all_department = Department::where('admin_or_user_id', '=', $userId)->get();

            // Get employee details along with their leave entries
            $employeedetails = Employee::with('Employeeleaves')->findOrFail($id);

            // Get all managers associated with the user
            $all_managers = Manager::where('admin_or_user_id', '=', $userId)->get();

            // Get all leave types
            $leave_types = LeaveType::all();

            // Ensure leave entries collection is initialized
            if (is_null($employeedetails->Employeeleaves)) {
                $employeedetails->Employeeleaves = collect(); // Initialize if null
            }

            return view('admin_panel.employees.edit-employee', [
                'all_department' => $all_department,
                'employeedetails' => $employeedetails,
                'all_managers' => $all_managers,
                'leave_types' => $leave_types,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function update_employee(Request $request, $id)
    {

        if (Auth::id()) {
            $employee = Employee::find($id);
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            Employee::where('id', $id)->update([
                'first_name'          => $request->first_name,
                'last_name'          => $request->last_name,
                'email'          => $request->email,
                'joining_date'          => $request->joining_date,
                'phone'          => $request->phone,
                'department'          => $request->department,
                'designation'          => $request->designation,
                'decided_salary' => $request->decided_salary,
                'reporting_manager' => $request->reporting_manager,
                'employee_status' => $request->employee_status,
                'address' => $request->address,
                'employee_gender' => $request->employee_gender,
                'number_of_leaves' => $request->number_of_leaves,
                'create_by' => $usertype,
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
                            'employee_id' => $employee->id,
                            'leave_type_id' => $leave_type_id,
                        ],
                        [
                            'leave_quota' => $leave_quota,
                            'usertype' => 'employee',
                        ]
                    );
                }
            }

            return Redirect()->back()->with('success-message-updte', 'Employee Updated successfully!');
        } else {
            return redirect()->back();
        }
    }
    public function deleted_employee_screen()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // Retrieve all employees deleted by the admin
            $deleted_employee = Employee::onlyTrashed()
                ->where('admin_or_user_id', $userId)
                ->get();
            return view('admin_panel.employees.deleted_employee_screen', [
                'deleted_employee' => $deleted_employee,
            ]);
        } else {
            return redirect()->back();
        }
    }
    
    public function getDesignations(Request $request)
    {
        $department = $request->input('department');
        $designations = Designation::where('department', $department)->pluck('designation')->toArray();
        return response()->json($designations);
    }

    public function emp_Change_Password()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('employee_panel.employee_change_password', [
                // 'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function emp_updte_change_Password(Request $request)
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
            $employee = Employee::where('id', $user->emp_id)->first();
            if ($employee) {
                $employee->password = $request->new_password;  // No hashing for the employee table password
                $employee->save();
            } else {
                return back()->with('error', 'employee record not found.');
            }

            return back()->with('success', 'Password changed successfully.');
        } else {
            return redirect()->back();
        }
    }
}
