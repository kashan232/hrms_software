<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function report_employee_attendance()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $Departments = Department::get();
            return view('admin_panel.reporting.employee_attendance.add_attendance', [
                'Departments' => $Departments,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function report_employee_monthly_attendance_record(Request $request)
    {

        if (Auth::id()) {
            $userId = Auth::id();
            $dept_name = $request->input('department');
            $attendance_date = $request->input('employee_attendance_date');
            // Extract the month and year from the selected date
            $year = date('Y', strtotime($attendance_date));
            $month = date('m', strtotime($attendance_date));

            // Days count nikalne ke liye cal_days_in_month function ka istemal karen
            // $days_count = cal_days_in_month(CAL_GREGORIAN, $month, $year);

            $days_count = date('t', strtotime($year . '-' . $month . '-01'));
            // dd($days_count);
            $attendance_records = EmployeeAttendance::where('department', $dept_name)
                ->whereYear('employee_attendance_date', $year)
                ->whereMonth('employee_attendance_date', $month)
                ->get();

            // dd($attendance_records);
            return view('admin_panel.reporting.employee_attendance.all_monthly_attendance', [
                'attendance_records' => $attendance_records,
                'attendance_date' => $attendance_date,
                'days_count' => $days_count,
            ]);

        } else {
            return redirect()->back();
        }
    }

    public function individual_employee_attendance(Request $request, $id, $dep, $at_date, $total_month_days)
    {

        if (Auth::id()) {
            $userId = Auth::id();
            $emp_name     = $request->input('emp_name');
            $emp_id       = $id;
            $emp_dep      = $dep;
            $emp_at_date  = $at_date;
            $year         = date('Y', strtotime($emp_at_date));
            $month        = date('m', strtotime($emp_at_date));
            $total_month_days = $total_month_days;
            $employee_data = EmployeeAttendance::selectRaw('
                SUM(CASE WHEN employee_attendance = "Present" THEN 1 ELSE 0 END) as present_count,
                SUM(CASE WHEN employee_attendance = "Absent" THEN 1 ELSE 0 END) as absent_count,
                SUM(CASE WHEN employee_attendance = "Leave" THEN 1 ELSE 0 END) as leave_count,
                department,
                job_designation,
                emp_name,
                employee_attendance_date,
                employee_attendance,
                start_time,
                end_time
            ')
                ->where('emp_id', $emp_id)
                ->where('department', $emp_dep)
                ->whereYear('employee_attendance_date', $year)
                ->whereMonth('employee_attendance_date', $month)
                ->groupBy('department', 'job_designation', 'emp_name', 'employee_attendance_date', 'employee_attendance','start_time','end_time')
                ->get();

            // dd($employee_data);
            
            // Calculate the counts after retrieving the data
            $present_count = $employee_data->sum('present_count');
            $absent_count = $employee_data->sum('absent_count');
            $leave_count = $employee_data->sum('leave_count');

            // dd($attendance_records);
            return view('admin_panel.reporting.employee_attendance.monthly_attendance_record', [
                'employee_data' => $employee_data,
                'emp_id'        => $emp_id,
                'emp_dep'       => $emp_dep,
                'emp_at_date'   => $emp_at_date,
                'emp_name'      => $emp_name,
                'total_month_days'      => $total_month_days,
                'present_count'      => $present_count,
                'absent_count'      => $absent_count,
                'leave_count'      => $leave_count,
            ]);

        } else {
            return redirect()->back();
        }
    }
}
