<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeTermination;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TerminationOfEmployeeController extends Controller
{

    public function hr_emp_termination()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $all_department = Department::all();
            $Employees = Employee::all();
            return view('hr_panel.employee_termination.add_employee_terimation', [
                'all_department' => $all_department,
                'Employees' => $Employees,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_hr_emp_termination(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $emp_id = Auth()->user()->emp_id;
            $userId = Auth::id();
            $EmployeeTermination = EmployeeTermination::create([
                'admin_or_user_id'    => $userId,
                'emp_id'    => $emp_id,
                'employee_name' => $request->employee_name,
                'curent_position'          => $request->curent_position,
                'termination_reason'          => $request->termination_reason,
                'termination_date'          => $request->termination_date,
                'severance_package'          => $request->severance_package,
                'final_comments'          => $request->final_comments,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
            return redirect()->back()->with('termination-added', 'Employee Termination Created Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function hr_emp_all_termination()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $emp_id = Auth()->user()->emp_id;
            $EmployeeTerminations = EmployeeTermination::where('emp_id', '=', $emp_id)->get();
            return view('hr_panel.employee_termination.all_employee_termination', [
                'EmployeeTerminations' => $EmployeeTerminations,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $termination = EmployeeTermination::findOrFail($id);
        $termination->termination_reason = $request->termination_reason;
        $termination->termination_date = $request->termination_date;
        $termination->severance_package = $request->severance_package;
        $termination->final_comments = $request->final_comments;
        $termination->save();

        return redirect()->back()->with('message', 'Termination updated successfully');

    }

    public function destroy($id)
    {
        $termination = EmployeeTermination::findOrFail($id);
        $termination->delete();

        return response()->json(['message' => 'Termination deleted successfully']);
    }
}
