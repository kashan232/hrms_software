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
use App\Models\EmployeePromotion;
use App\Models\EmployeeResignation;
use App\Models\HrMnagerAttendance;
use App\Models\Manager;
use App\Models\MnagerAttendance;
use App\Models\OfferLetter;
use Artisan;
use Carbon\Carbon;

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
                // Leave counts
                $totalLeaveCount = DB::table('leave_requests')->count();
                $approvedLeaveCount = DB::table('leave_requests')->where('leave_approve', 'Approve')->count();
                $pendingLeaveCount = DB::table('leave_requests')->where('leave_approve', 'Pending')->count();
                $rejectedLeaveCount = DB::table('leave_requests')->where('leave_approve', 'Reject')->count(); // Assuming "Reject" is another status

                // Count attendance for Present, Absent, and Leave
                $presentCount = DB::table('employee_attendances')->where('employee_attendance', 'Present')->count();
                $absentCount = DB::table('employee_attendances')->where('employee_attendance', 'Absent')->count();
                $leaveCount = DB::table('employee_attendances')->where('employee_attendance', 'Leave')->count();

                // HR & Manager Attendance
                $hrPresentCount = DB::table('hr_mnager_attendances')->where('employee_attendance', 'Present')->count();
                $hrAbsentCount = DB::table('hr_mnager_attendances')->where('employee_attendance', 'Absent')->count();

                // Calculate total HR attendance for percentage calculation
                $totalHRAttendance = $hrPresentCount + $hrAbsentCount;

                // Calculate percentages
                $hrPresentCountPercentage = $totalHRAttendance > 0 ? ($hrPresentCount / $totalHRAttendance) * 100 : 0;
                $hrAbsentCountPercentage = $totalHRAttendance > 0 ? ($hrAbsentCount / $totalHRAttendance) * 100 : 0;


                // dd($hrPresentCount,$hrAbsentCount);

                // Fetch expenses and prepare data for chart
                $expenses = Expense::select('date', DB::raw('SUM(total_paid) as total_expense'))
                    ->groupBy('date')
                    ->orderBy('date')
                    ->get();


                // Prepare data for the chart
                $expenseLabels = $expenses->pluck('date')->toArray(); // Extract dates
                $expenseData = $expenses->pluck('total_expense')->toArray(); // Extract total expenses

                // dd($presentCount,$absentCount,$leaveCount);
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
                        'projects' => $projects,
                        'totalLeaveCount' => $totalLeaveCount,
                        'approvedLeaveCount' => $approvedLeaveCount,
                        'pendingLeaveCount' => $pendingLeaveCount,
                        'rejectedLeaveCount' => $rejectedLeaveCount,
                        'presentCount' => $presentCount,
                        'absentCount' => $absentCount,
                        'leaveCount' => $leaveCount,
                        'hrPresentCount' => $hrPresentCount,
                        'hrAbsentCount' => $hrAbsentCount,
                        'expenses' => $expenses, // Raw data for displaying if needed
                        'expenseLabels' => $expenseLabels, // For chart labels
                        'expenseData' => $expenseData,
                        'hrPresentCountPercentage' => $hrPresentCountPercentage, // Pass percentage to view
                        'hrAbsentCountPercentage' => $hrAbsentCountPercentage
                    ]
                );
            } else if ($usertype == 'employee') {
                $emp_id = Auth()->user()->emp_id;
                // dd($emp_id);
                // Check if the employee's resignation status is approved
                $employeeResignationStatus = EmployeeResignation::where('emp_id', $emp_id)->value('status');

                if ($employeeResignationStatus === 'Approve') {
                    // Logout the employee
                    Auth::logout();

                    // Redirect back to the login page with an error message
                    return redirect()->route('login')->withErrors(['Your resignation has been approved. You can no longer access the system.']);
                }

                // dd($emp_id);

                $currentDate = date('Y-m-d');

                // Check if today's attendance exists
                $attendanceExists = EmployeeAttendance::where('emp_id', $emp_id)
                    ->where('employee_attendance_date', $currentDate)
                    ->exists();

                // Get the logged-in employee's name
                $employeeName = auth()->user()->name;

                // Count the leave requests for the logged-in employee
                $leaves = LeaveRequest::where('Employee', $employeeName)->count();
                $task = Task::where('task_assign_person', $employeeName)->count();
                $name = Auth::user()->name;

                $CompleteTasks = DB::table('tasks')->where('task_assign_person', '=', $name)->where('status', 'Complete')->count();
                $IncompleteTasks = DB::table('tasks')->where('task_assign_person', '=', $name)->where('status', 'Incomplete')->count();

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

                $totalAttendancechart = EmployeeAttendance::where('emp_id', $emp_id)->count();

                // Calculate the total presents for the current month
                $totalPresentchart = EmployeeAttendance::where('emp_id', '=', $emp_id)
                    ->where('employee_attendance', '=', 'Present')
                    ->count();

                $totalAbsentchart = EmployeeAttendance::where('emp_id', '=', $emp_id)
                    ->where('employee_attendance', '=', 'Absent')
                    ->count();

                $totalLeavechart = EmployeeAttendance::where('emp_id', '=', $emp_id)
                    ->where('employee_attendance', '=', 'Leave')
                    ->count();

                // Calculate the total presents for the current month
                $totalPresent = EmployeeAttendance::where('emp_id', '=', $emp_id)
                    ->whereMonth('employee_attendance_date', '=', $currentMonth)
                    ->whereYear('employee_attendance_date', '=', $currentYear)
                    ->where('employee_attendance', '=', 'Present')
                    ->count();

                // Calculate the total absents for the current month
                $totalAbsent = EmployeeAttendance::where('emp_id', '=', $emp_id)
                    ->whereMonth('employee_attendance_date', '=', $currentMonth)
                    ->whereYear('employee_attendance_date', '=', $currentYear)
                    ->where('employee_attendance', '=', 'Absent')
                    ->count();

                // Calculate the total leaves for the current month
                $totalLeave = EmployeeAttendance::where('emp_id', '=', $emp_id)
                    ->whereMonth('employee_attendance_date', '=', $currentMonth)
                    ->whereYear('employee_attendance_date', '=', $currentYear)
                    ->where('employee_attendance', '=', 'Leave')
                    ->count();

                $employeetasks = Task::where('task_assign_person', '=', $name)->get();

                // Average Hours
                $averageHours = DB::table('employee_attendances')
                    ->select(DB::raw("SEC_TO_TIME(AVG(TIME_TO_SEC(TIMEDIFF(end_time, start_time)))) AS average_hours"))
                    ->where('emp_id', $emp_id)
                    ->where('employee_attendance', 'Present')
                    ->whereNotNull('start_time')
                    ->whereNotNull('end_time')
                    ->first();

                // Average Check-In
                $averageCheckIn = DB::table('employee_attendances')
                    ->select(DB::raw("SEC_TO_TIME(AVG(TIME_TO_SEC(start_time))) AS average_check_in"))
                    ->where('emp_id', $emp_id)
                    ->where('employee_attendance', 'Present')
                    ->whereNotNull('start_time')
                    ->first();

                // On-Time Arrival (before or at 9:00 AM)
                $onTimeArrival = DB::table('employee_attendances')
                    ->select(DB::raw("(SUM(CASE WHEN start_time <= '09:00:00' THEN 1 ELSE 0 END) / COUNT(*)) * 100 AS on_time_percentage"))
                    ->where('emp_id', $emp_id)
                    ->where('employee_attendance', 'Present')
                    ->whereNotNull('start_time')
                    ->first();

                // Average Check-Out
                $averageCheckOut = DB::table('employee_attendances')
                    ->select(DB::raw("SEC_TO_TIME(AVG(TIME_TO_SEC(end_time))) AS average_check_out"))
                    ->where('emp_id', $emp_id)
                    ->where('employee_attendance', 'Present')
                    ->whereNotNull('end_time')
                    ->first();

                // Format the results
                $formattedAverageHours = gmdate('H:i:s', strtotime($averageHours->average_hours));
                $formattedAverageCheckIn = gmdate('H:i:s', strtotime($averageCheckIn->average_check_in));
                $formattedAverageCheckOut = gmdate('H:i:s', strtotime($averageCheckOut->average_check_out));
                $formattedOnTimeArrival = number_format($onTimeArrival->on_time_percentage, 1) . '%';

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
                    'totalAttendancechart' => $totalAttendancechart,
                    'totalPresentchart' => $totalPresentchart,
                    'totalAbsentchart' => $totalAbsentchart,
                    'totalLeavechart' => $totalLeavechart,
                    'averageHours' => $formattedAverageHours,
                    'averageCheckIn' => $formattedAverageCheckIn,
                    'onTimeArrival' => $formattedOnTimeArrival,
                    'averageCheckOut' => $formattedAverageCheckOut,
                    'CompleteTasks' => $CompleteTasks,
                    'IncompleteTasks' => $IncompleteTasks,
                    'attendanceExists' => $attendanceExists

                ]);
            } else if ($usertype == 'hr') {
                $leaves = LeaveRequest::count();
                $projectCount = Project::count();
                $taskCount = Task::count();
                $remoteEmployeeCount = EmployeeRemoteWork::count();
                $hiringCount = Hiring::count();
                $revenueCount = Revenue::count();
                $expenseCount = Expense::count();
                $EmployeeResignations = EmployeeResignation::count();
                $EmployeePromotions = EmployeePromotion::count();
                $OfferLetters = OfferLetter::count();
                $all_project = Project::Count();

                $userId = Auth::id();
                $all_expense = Expense::where('admin_or_user_id', '=', $userId)->get();
                // Fetch job application data
                $totalApplications = JobApplicationForm::count();
                $approvedApplications = JobApplicationStatus::where('application_status', 'Approve')->count();
                $rejectedApplications = JobApplicationStatus::where('application_status', 'Reject')->count();
                $hremployeecounts = Employee::where('create_by', '=', 'hr')->pluck('id')->count();

                $all_managercounts = Manager::where('admin_or_user_id', '=', $userId)->where('created_by', '=', $usertype)->count();


                // Get employee IDs created by HR
                $employeeIds = Employee::where('create_by', '=', 'hr')->pluck('id');

                // Fetch attendance records for these employees
                $attendanceRecords = EmployeeAttendance::whereIn('emp_id', $employeeIds)->get();

                // Calculate attendance stats
                $attendanceStats = [
                    'present' => $attendanceRecords->where('employee_attendance', 'Present')->count(),
                    'absent' => $attendanceRecords->where('employee_attendance', 'Absent')->count(),
                    'leave' => $attendanceRecords->where('employee_attendance', 'Leave')->count(),
                    'ontime' => $attendanceRecords->filter(function ($attendance) {
                        return $attendance->start_time <= '09:00:00'; // Adjust this time based on your on-time definition
                    })->count(),
                ];

                $LeaveRequests = LeaveRequest::where('admin_or_user_id', '=', $userId)->get();
                // dd($LeaveRequests);

                // Get employee IDs created by HR
                $employeeIds = Employee::where('create_by', '=', 'hr')->pluck('id');

                // Fetch attendance records for these employees
                $attendanceRecords = EmployeeAttendance::whereIn('emp_id', $employeeIds)->get();

                // Calculate attendance stats
                $attendanceStats = [
                    'present' => $attendanceRecords->where('employee_attendance', 'Present')->count(),
                    'absent' => $attendanceRecords->where('employee_attendance', 'Absent')->count(),
                    'leave' => $attendanceRecords->where('employee_attendance', 'Leave')->count(),
                    'ontime' => $attendanceRecords->filter(function ($attendance) {
                        return $attendance->start_time <= '09:00:00'; // Adjust this time based on your on-time definition
                    })->count(),
                ];
                $currentDate = date('Y-m-d');
                $emp_id = auth()->user()->emp_id;

                // Check if today's attendance exists
                $attendanceExists = HrMnagerAttendance::where('emp_id', $emp_id)
                    ->where('employee_attendance_date', $currentDate)
                    ->exists();

                // dd($attendanceExists);
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
                        'attendanceStats' => $attendanceStats,
                        'LeaveRequests' => $LeaveRequests,
                        'hremployeecounts' => $hremployeecounts,
                        'EmployeeResignations' => $EmployeeResignations,
                        'EmployeePromotions' => $EmployeePromotions,
                        'OfferLetters' => $OfferLetters,
                        'all_managercounts' => $all_managercounts,
                        'attendanceExists' => $attendanceExists
                    ]
                );
            } else if ($usertype == 'manager') {
                $emp_id = auth()->user()->emp_id;
                $userId = Auth::id();

                // dd($emp_id);

                $currentDate = date('Y-m-d');

                // Check if today's attendance exists
                $attendanceExists = MnagerAttendance::where('emp_id', $emp_id)
                    ->where('employee_attendance_date', $currentDate)
                    ->exists();

                $leaves = LeaveRequest::where('usertype', '=', 'manager')->where('admin_or_user_id', '=', $userId)->count();
                $attendances = HrMnagerAttendance::where('emp_id', '=', $emp_id)->where('job_designation', '=', 'Manager')->count();

                // Fetch leave status counts
                $leaveApproved = LeaveRequest::where('userid', $emp_id)
                    ->where('usertype', 'manager')
                    ->where('leave_approve', 'Approved')->count();
                $leavePending = LeaveRequest::where('userid', $emp_id)
                    ->where('usertype', 'manager')
                    ->where('leave_approve', 'Pending')->count();
                $leaveReject = LeaveRequest::where('userid', $emp_id)
                    ->where('usertype', 'manager')
                    ->where('leave_approve', 'Reject')->count();
                // dd($leaveApproved,$leavePending,$leaveReject);
                // dd($attendances);
                $employee = Employee::where('reporting_manager', $emp_id)->count();
                $taskCount = Task::where('admin_or_user_id', '=', $userId)->count();
                $remoteEmployeeCount = EmployeeRemoteWork::count();
                $hiringCount = Hiring::where('admin_or_user_id', '=', $userId)->count();
                $revenueCount = Revenue::count();
                $expenseCount = Expense::where('userId', '=', $emp_id)->count();
                $all_project = Project::count();
                $all_project_detais = Project::all();

                $expenseData = Expense::where('usertype', 'manager')
                    ->selectRaw('status, SUM(total_paid) as amount')
                    ->groupBy('status')
                    ->pluck('amount', 'status')
                    ->toArray();
                $all_task = Task::all();

                // Set default values in case any status is missing
                $expenseData = array_merge(['paid' => 0, 'pending' => 0, 'rejected' => 0], $expenseData);


                return view(
                    'manager_panel.manager_dashboard',
                    [
                        'leaves' => $leaves,
                        'taskCount' => $taskCount,
                        'remoteEmployeeCount' => $remoteEmployeeCount,
                        'hiringCount' => $hiringCount,
                        'revenueCount' => $revenueCount,
                        'expenseCount' => $expenseCount,
                        'all_project' => $all_project,
                        'employee' => $employee,
                        'attendances' => $attendances,
                        'leaveApproved' => $leaveApproved,
                        'leavePending' => $leavePending,
                        'leaveReject' => $leaveReject,
                        'expenseData' => $expenseData,
                        'all_project_detais' => $all_project_detais,
                        'all_task' => $all_task,
                        'attendanceExists' => $attendanceExists,
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


    public function markAbsent(Request $request)
    {
        // Run the Artisan command when button is clicked
        Artisan::call('attendance:mark-absent');

        // Redirect back with success message
        return redirect()->back()->with('status', 'Absent attendance marked successfully.');
    }

    public function markAbsentManager(Request $request)
    {
        // Artisan command ko call karein
        Artisan::call('attendance:mark-absent-manager');

        // Success message ke sath return karein
        return redirect()->back()->with('status', 'Manager Absent attendance marked successfully.');
    }

    public function markAbsentEmployee(Request $request)
    {
        // Artisan command ko call karein
        Artisan::call('attendance:mark-absent-manager');

        // Success message ke sath return karein
        return redirect()->back()->with('status', 'Manager Absent attendance marked successfully.');
    }
}
