<?php

namespace App\Http\Controllers;

use App\Models\CRMExperience;
use App\Models\CRMInsurance;
use App\Models\CRMSalaire;
use App\Models\CRMSkill;
use App\Models\CRMSuggestion;
use App\Models\CRMTraininge;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeAttendance;
use App\Models\Expense;
use App\Models\Hiring;
use App\Models\Hr;
use App\Models\LeaveRequest;
use App\Models\Manager;
use App\Models\Project;
use App\Models\Revenue;
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

            $employees = Employee::where('department', $department)
                ->where('designation', $designation)
                ->get(['id', 'first_name', 'last_name'])
                ->mapWithKeys(function ($employee) {
                    return [$employee->id => $employee->first_name . ' ' . $employee->last_name];
                });

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

    public function report_revenue()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $Departments = Department::get();
            return view('admin_panel.reporting.revenue_report.revenue_report', [
                'Departments' => $Departments,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function get_revenue_report(Request $request)
    {
        if (Auth::id()) {
            $dateFrom = $request->input('date_from');
            $dateTo = $request->input('date_to');

            $Revenues = Revenue::whereBetween('date', [$dateFrom, $dateTo])->get();

            return response()->json(['Revenues' => $Revenues]);
        } else {
            return redirect()->back();
        }
    }

    public function report_leave()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $Departments = Department::get();
            return view('admin_panel.reporting.leave_report.leave_report', [
                'Departments' => $Departments,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function get_leave_report(Request $request)
    {

        if (Auth::id()) {
            $userId = Auth::id();
            $department = $request->input('department');
            $designation = $request->input('designation');
            $employee = $request->input('employee');

            $LeaveRequests = LeaveRequest::where('department', $department)
                ->where('designation', $designation)
                ->where('employee', $employee)
                ->get();

            return response()->json(['LeaveRequests' => $LeaveRequests]);
        } else {
            return redirect()->back();
        }
    }

    public function hr_report_leave()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $hrs = Hr::all();
            return view('admin_panel.reporting.leave_report.hr_leave_report', [
                'hrs' => $hrs,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function get_hr_leave_report(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $hr = $request->input('hr');
            $designation = $request->input('designation');

            $LeaveRequests = LeaveRequest::where('Employee', $hr)
                ->where('designation', $designation)
                ->get();
            // dd($LeaveRequests);
            return response()->json(['LeaveRequests' => $LeaveRequests]);
        } else {
            return redirect()->back();
        }
    }
    public function manager_report_leave()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $Managers = Manager::all();
            return view('admin_panel.reporting.leave_report.manager_leave_report', [
                'Managers' => $Managers,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function get_manager_leave_report(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $Manager = $request->input('Manager');
            $designation = $request->input('designation');

            $LeaveRequests = LeaveRequest::where('Employee', $Manager)
                ->where('designation', $designation)
                ->get();
            // dd($LeaveRequests);
            return response()->json(['LeaveRequests' => $LeaveRequests]);
        } else {
            return redirect()->back();
        }
    }
    public function report_expense_hr()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $Departments = Department::get();
            return view('hr_panel.reporting.expense_report.expense_report', [
                'Departments' => $Departments,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function get_expense_report_hr(Request $request)
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
    public function report_employee_cmr_hr()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $Departments = Department::get();
            return view('hr_panel.reporting.cmr_report.cmr_report', [
                'Departments' => $Departments,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function get_report_employee_cmr_hr(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }

        $type = $request->input('type');
        $data = [];

        switch ($type) {
            case 'skills':
                $data = CRMSkill::all();
                break;
            case 'insurance':
                $data = CRMInsurance::all();
                break;
            case 'training':
                $data = CRMTraininge::all();
                break;
            case 'experience':
                $data = CRMExperience::all(['employee_name', 'emp_department as department', 'emp_designation as designation', 'organization', 'designation as emp_designation', 'start_date', 'end_date', 'total_experience']);
                break;
            case 'salaries':
                $data = CRMSalaire::all();
                break;
            case 'suggestion':
                $data = CRMSuggestion::all();
                break;
            default:
                return response()->json(['error' => 'Invalid CMR type'], 400);
        }

        return response()->json(['data' => $data]);
    }
    public function report_all_jobs_hr()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $Departments = Department::get();
            return view('hr_panel.reporting.jobs_report.jobs_report', [
                'Departments' => $Departments,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function get_jobs_report(Request $request)
    {
        if (Auth::id()) {
            $dateFrom = $request->input('date_from');
            $dateTo = $request->input('date_to');
    
            $jobs = Hiring::whereBetween('date', [$dateFrom, $dateTo])->get();
    
            return response()->json(['jobs' => $jobs]); // Changed 'jobss' to 'jobs'
        } else {
            return redirect()->back();
        }
    }
    public function report_expense_manager()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $Departments = Department::get();
            return view('manager_panel.reporting.expense_report.expense_report', [
                'Departments' => $Departments,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function get_expense_report_manager(Request $request)
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

    public function report_all_jobs_manager()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $Departments = Department::get();
            return view('manager_panel.reporting.jobs_report.jobs_report', [
                'Departments' => $Departments,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function get_jobs_report_manager(Request $request)
    {
        if (Auth::id()) {
            $dateFrom = $request->input('date_from');
            $dateTo = $request->input('date_to');
    
            $jobs = Hiring::whereBetween('date', [$dateFrom, $dateTo])->get();
    
            return response()->json(['jobs' => $jobs]); // Changed 'jobss' to 'jobs'
        } else {
            return redirect()->back();
        }
    }

    public function report_all_task_manager()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $Projects = Project::all();
            // dd($Projects);
            return view('manager_panel.reporting.task_report.task_report', [
                'Projects' => $Projects,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function get_task_report_manager(Request $request)
    {
        if (Auth::id()) {
            $project_name = $request->input('project_name');
            $tasks = Task::where('project_name', $project_name)->get();
            return response()->json(['tasks' => $tasks]); // Corrected 'taskss' to 'tasks'
        } else {
            return redirect()->back();
        }
    }
}
