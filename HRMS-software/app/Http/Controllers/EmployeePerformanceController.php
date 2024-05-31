<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeAttendance;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeePerformanceController extends Controller
{
    public function employee_performance()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $emp_id = Auth()->user()->emp_id;
            $all_employee = Employee::where('id', '=', $emp_id)->first();

            // Get the current month and year
            $currentMonth = date('m');
            $currentYear = date('Y');

            // Calculate the total presents for the current month
            $totalPresent = EmployeeAttendance::where('emp_id', '=', $emp_id)
                ->whereMonth('employee_attendance_date', '=', $currentMonth)
                ->whereYear('employee_attendance_date', '=', $currentYear)
                ->where('employee_attendance', '=', 'present')
                ->count();

            // Calculate the total absents for the current month
            $totalAbsent = EmployeeAttendance::where('emp_id', '=', $emp_id)
                ->whereMonth('employee_attendance_date', '=', $currentMonth)
                ->whereYear('employee_attendance_date', '=', $currentYear)
                ->where('employee_attendance', '=', 'absent')
                ->count();

            // Calculate the total leaves for the current month
            $totalLeave = EmployeeAttendance::where('emp_id', '=', $emp_id)
                ->whereMonth('employee_attendance_date', '=', $currentMonth)
                ->whereYear('employee_attendance_date', '=', $currentYear)
                ->where('employee_attendance', '=', 'leave')
                ->count();
            // Calculate the total tasks assigned to the user
            $totalTasks = Task::where('emp_id', '=', $emp_id)->count();
            $completedTasksCount = Task::where('emp_id', '=', $emp_id)
                ->where('status', '=', 'complete')
                ->count();
            $incompletedTasksCount = Task::where('emp_id', '=', $emp_id)
            ->where('status', '=', 'incomplete')
            ->count();

            $employeetasks = Task::where('emp_id', '=', $emp_id)->get();
            // dd($employeetasks);

            return view('employee_panel.perfomance.employe_perfomance', [
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
}
