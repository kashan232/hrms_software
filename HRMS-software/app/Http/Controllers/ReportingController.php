<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeAttendance;
use App\Models\Expense;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportingController extends Controller
{
    public function report_employee_performance()
    {

        if (Auth::id()) {

            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $Departments = Department::get();
            return view('admin_panel.reporting.employee_perfomance.check_perfomance', [
                'Departments' => $Departments,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function get_employees(Request $request)
    {

        if (Auth::id()) {

            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $designation = $request->designation;
            $department = $request->department;
            $employees = Employee::where('department', $department)->where('designation', $designation)->pluck('first_name', 'id');
            return response()->json($employees);
        } else {
            return redirect()->back();
        }
    }

    public function get_report_employee_performance(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // $emp_id = Auth()->user()->emp_id;

            $designation = $request->designation;
            $department = $request->department;
            $employee_id = $request->employee;

            $all_employee = Employee::where('id', '=', $employee_id)->where('department', '=', $department)->where('designation', '=', $designation)->first();
            // dd($all_employee);

            // Get the current month and year
            $currentMonth = date('m');
            $currentYear = date('Y');

            // Calculate the total presents for the current month
            $totalPresent = EmployeeAttendance::where('emp_id', '=', $employee_id)
                ->whereMonth('employee_attendance_date', '=', $currentMonth)
                ->whereYear('employee_attendance_date', '=', $currentYear)
                ->where('employee_attendance', '=', 'present')
                ->count();

            // Calculate the total absents for the current month
            $totalAbsent = EmployeeAttendance::where('emp_id', '=', $employee_id)
                ->whereMonth('employee_attendance_date', '=', $currentMonth)
                ->whereYear('employee_attendance_date', '=', $currentYear)
                ->where('employee_attendance', '=', 'absent')
                ->count();

            // Calculate the total leaves for the current month
            $totalLeave = EmployeeAttendance::where('emp_id', '=', $employee_id)
                ->whereMonth('employee_attendance_date', '=', $currentMonth)
                ->whereYear('employee_attendance_date', '=', $currentYear)
                ->where('employee_attendance', '=', 'leave')
                ->count();
            // Calculate the total tasks assigned to the user
            $totalTasks = Task::where('emp_id', '=', $employee_id)->count();
            $completedTasksCount = Task::where('emp_id', '=', $employee_id)
                ->where('status', '=', 'complete')
                ->count();
            $incompletedTasksCount = Task::where('emp_id', '=', $employee_id)
            ->where('status', '=', 'incomplete')
            ->count();

            $employeetasks = Task::where('emp_id', '=', $employee_id)->get();
            // dd($employeetasks);

            return view('admin_panel.reporting.employee_perfomance.employe_perfomance', [
                'all_employee' => $all_employee,
                'total_present' => $totalPresent,
                'total_absent' => $totalAbsent,
                'total_leave' => $totalLeave,
                'total_tasks' => $totalTasks,
                'completed_tasks_count' => $completedTasksCount,
                'incompletedTasksCount' => $incompletedTasksCount,
                'employeetasks' => $employeetasks,
            ]);
        } else {
            return redirect()->back();
        }
    }


    public function report_expense()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $Departments = Department::get();
            return view('admin_panel.reporting.expense_report.expense_report', [
                'Departments' => $Departments,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function get_expense_report(Request $request)
    {
        if (Auth::id()) {
            $dateFrom = $request->input('date_from');
            $dateTo = $request->input('date_to');
        
            $expenses = Expense::whereBetween('date', [$dateFrom, $dateTo])->get();
        
            return response()->json(['expenses' => $expenses]);
        } else {
            return redirect()->back();
        }
    }

    public function report6()
    {
    }

    public function report7()
    {
    }

    public function report8()
    {
    }

    public function report9()
    {
    }

    public function report10()
    {
    }

    public function report11()
    {
    }
    public function report12()
    {
    }
    public function report13()
    {
    }
    public function report14()
    {
    }
    public function report15()
    {
    }
    public function report16()
    {
    }
    public function report17()
    {
    }
    public function report18()
    {
    }
    public function report19()
    {
    }
    public function report20()
    {
    }
}
