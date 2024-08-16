<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\EmployeeRemoteWork;
use App\Models\Expense;
use App\Models\Hiring;
use App\Models\JobApplicationForm;
use App\Models\JobApplicationStatus;
use App\Models\LeaveRequest;
use App\Models\Project;
use App\Models\Revenue;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\CRMExperience;
use App\Models\CRMInsurance;
use App\Models\CRMSalaire;
use App\Models\CRMSkill;
use App\Models\CRMSuggestion;
use App\Models\CRMTraininge;
use App\Models\EmployeeAttendance;

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

                $expenses = Expense::select('date', DB::raw('SUM(total_paid) as total_expense'))
                    ->groupBy('date')
                    ->orderBy('date')
                    ->get();

                // Fetch project data
                $projects = Project::select('project_name', 'status', 'priority', 'budget')->get();
                return view(
                    'admin_panel.admin_dashboard',
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
                        'expenses' => $expenses,
                        'projects' => $projects
                    ]
                );
            } else if ($usertype == 'employee') {
                // Get the logged-in employee's name
                $employeeName = auth()->user()->name;
                // Count the leave requests for the logged-in employee
                $leaves = LeaveRequest::where('Employee', $employeeName)->count();
                $task = Task::where('task_assign_person', $employeeName)->count();

                $emp_id = Auth()->user()->emp_id;

                // dd($userId);
                $CRMSkills = CRMSkill::where('emp_id', '=', $emp_id)->count();
                $CRMSalaires = CRMSalaire::where('emp_id', '=', $emp_id)->count();
                $CRMInsurances = CRMInsurance::where('emp_id', '=', $emp_id)->count();
                $CRMTraininges = CRMTraininge::where('emp_id', '=', $emp_id)->count();
                $CRMExperiences = CRMExperience::where('emp_id', '=', $emp_id)->count();
                $CRMSuggestions = CRMSuggestion::where('emp_id', '=', $emp_id)->count();

                $attendance_records = EmployeeAttendance::where('emp_id', $emp_id)->count();

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

                $name = Auth::user()->name;
                $employeetasks = Task::where('task_assign_person', '=', $name)->get();


                return view('employee_panel.employee_dashboard', [
                    'leaves' => $leaves,
                    'task' => $task,
                    'CRMSkills' => $CRMSkills,
                    'CRMSalaires' => $CRMSalaires,
                    'CRMInsurances' => $CRMInsurances,
                    'CRMTraininges' => $CRMTraininges,
                    'CRMExperiences' => $CRMExperiences,
                    'CRMSuggestions' => $CRMSuggestions,
                    'attendance_records' => $attendance_records,
                    'all_employee' => $all_employee,
                    'totalPresent' => $totalPresent,
                    'totalAbsent' => $totalAbsent,
                    'totalLeave' => $totalLeave,
                    'employeetasks' => $employeetasks,
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

                $userId = Auth::id();
                $all_expense = Expense::where('admin_or_user_id', '=', $userId)->get();
                // Fetch job application data
                $totalApplications = JobApplicationForm::count();
                $approvedApplications = JobApplicationStatus::where('application_status', 'Approve')->count();
                $rejectedApplications = JobApplicationStatus::where('application_status', 'Reject')->count();


                return view(
                    'hr_panel.hr_dashboard',
                    [
                        'leaves' => $leaves,
                        'projectCount' => $projectCount,
                        'taskCount' => $taskCount,
                        'remoteEmployeeCount' => $remoteEmployeeCount,
                        'hiringCount' => $hiringCount,
                        'revenueCount' => $revenueCount,
                        'expenseCount' => $expenseCount,
                        'all_project' => $all_project,
                        'totalApplications' => $totalApplications,
                        'approvedApplications' => $approvedApplications,
                        'rejectedApplications' => $rejectedApplications,
                        'all_expense' => $all_expense,
                    ]
                );
            } else if ($usertype == 'manager') {
                $emp_id = auth()->user()->emp_id;
                $leaves = LeaveRequest::count();
                $employee = Employee::where('reporting_manager', $emp_id)->count();
                $projectCount = Project::count();
                $taskCount = Task::count();
                $remoteEmployeeCount = EmployeeRemoteWork::count();
                $hiringCount = Hiring::count();
                $revenueCount = Revenue::count();
                $expenseCount = Expense::count();
                $all_project = Project::count();
                return view(
                    'manager_panel.manager_dashboard',
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
                    ]
                );
            }
        } else {
            // return redirect()->back();
            return redirect()->route('login');
        }
    }

    public function Admin_Change_Password()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.admin_change_password', [
                // 'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function updte_change_Password(Request $request)
    {
        if (Auth::id()) {
            // dd($request);
            // Validate the form data
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|min:8',
                'retype_new_password' => 'required|same:new_password'
            ]);

            // Get the current authenticated user
            $user = Auth::user();
            // dd($user);
            // Check if the old password matches
            if (!Hash::check($request->input('old_password'), $user->password)) {
                return redirect()->back()->withErrors(['old_password' => 'Old password is incorrect']);
            }

            // Check if the user is an admin
            if ($user->usertype !== 'admin') {
                return redirect()->back()->withErrors(['error' => 'Unauthorized action']);
            }

            // Update the password
            $user->password = Hash::make($request->input('new_password'));
            $user->save();

            // Add a success message to the session
            Session::flash('success', 'Password changed successfully');

            // Redirect back with success message
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
