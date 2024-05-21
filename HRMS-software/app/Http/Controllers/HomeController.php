<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\EmployeeRemoteWork;
use App\Models\Expense;
use App\Models\Hiring;
use App\Models\LeaveRequest;
use App\Models\Project;
use App\Models\Revenue;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
    
            if ($usertype == 'user') {
                return view('dashboard');
            } else if ($usertype == 'admin') {
                $departCount = Department::count();
                $designationCount = Designation::count();
                $employeeCount = Employee::count();
                $projectCount = Project::count();
                $taskCount = Task::count();
                $remoteEmployeeCount = EmployeeRemoteWork::count();
                $hiringCount = Hiring::count();
                $revenueCount = Revenue::count();
                $expenseCount = Expense::count();
                $all_project = Project::count();
                return view('admin_panel.admin_dashboard', 
            [
                'departCount' => $departCount,
                'designationCount' => $designationCount,
                'employeeCount' => $employeeCount,
                'projectCount' => $projectCount,
                'taskCount' => $taskCount,
                'remoteEmployeeCount' => $remoteEmployeeCount,
                'hiringCount' => $hiringCount,
                'revenueCount' => $revenueCount,
                'expenseCount' => $expenseCount,
                'all_project' => $all_project,
            ]);
            }else if ($usertype == 'employee') {
                // Get the logged-in employee's name
                $employeeName = auth()->user()->name;
                // Count the leave requests for the logged-in employee
                $leaves = LeaveRequest::where('Employee', $employeeName)->count();
                $task = Task::where('task_assign_person', $employeeName)->count();
            
                return view('employee_panel.employee_dashboard', [
                    'leaves' => $leaves,
                    'task' => $task,
                ]);
            } else if ($usertype == 'hr') {
                $leaves = LeaveRequest::count();
                $projectCount = Project::count();
                $taskCount = Task::count();
                $remoteEmployeeCount = EmployeeRemoteWork::count();
                $hiringCount = Hiring::count();
                $revenueCount = Revenue::count();
                $expenseCount = Expense::count();
                $all_project = Project::Count();
                return view('hr_panel.hr_dashboard',
                [
                    'leaves' => $leaves,
                    'projectCount' => $projectCount,
                    'taskCount' => $taskCount,
                    'remoteEmployeeCount' => $remoteEmployeeCount,
                    'hiringCount' => $hiringCount,
                    'revenueCount' => $revenueCount,
                    'expenseCount' => $expenseCount,
                    'all_project' => $all_project,
                ]);
            } else if ($usertype == 'manager') {
                $leaves = LeaveRequest::count();
                $employee = Employee::count();
                $projectCount = Project::count();
                $taskCount = Task::count();
                $remoteEmployeeCount = EmployeeRemoteWork::count();
                $hiringCount = Hiring::count();
                $revenueCount = Revenue::count();
                $expenseCount = Expense::count();
                $all_project = Project::count();
                return view('manager_panel.manager_dashboard',
                [
                    'leaves' => $leaves,
                    'projectCount' => $projectCount,
                    'taskCount' => $taskCount,
                    'remoteEmployeeCount' => $remoteEmployeeCount,
                    'hiringCount' => $hiringCount,
                    'revenueCount' => $revenueCount,
                    'expenseCount' => $expenseCount,
                    'all_project' => $all_project,
                    'employee' => $employee,
                ]);
            }
        } else {
            // return redirect()->back();
            return redirect()->route('login');
        }
    }
}
