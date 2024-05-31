<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function all_employee()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_employee = Employee::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.employees.all_employee', [
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
            // dd($all_managers);
            return view('admin_panel.employees.add_employee', [
                'all_department' => $all_department,
                'all_managers' => $all_managers,
            ]);
        } else {
            return redirect()->back();
        }

        return view('');
    }
    public function store_employee(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // Create the employee record
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
            // dd($userId);
            $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            $employeedetails = Employee::findOrFail($id);
            $all_managers = Manager::where('admin_or_user_id', '=', $userId)->get();

            return view('admin_panel.employees.edit-employee', [
                'all_department' => $all_department,
                'employeedetails' => $employeedetails,
                'all_managers' => $all_managers,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function update_employee(Request $request, $id)
    {

        if (Auth::id()) {
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
                'updated_at' => Carbon::now(),
            ]);
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
    
}
