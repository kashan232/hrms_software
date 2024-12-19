<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeAttendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    // public function report_employee_monthly_attendance_record(Request $request)
    // {
    //     if (Auth::id()) {
    //         $userId = Auth::id();
    //         $dept_name = $request->input('department');
    //         $attendance_date = $request->input('employee_attendance_date');

    //         // Extract year and month from the selected date
    //         $year = date('Y', strtotime($attendance_date));
    //         $month = date('m', strtotime($attendance_date));

    //         // Calculate days in the selected month
    //         $days_count = date('t', strtotime("$year-$month-01"));

    //         // Fetch attendance records
    //         $attendance_records = EmployeeAttendance::where('department', $dept_name)
    //             ->whereYear('employee_attendance_date', $year)
    //             ->whereMonth('employee_attendance_date', $month)
    //             ->get()
    //             ->keyBy('employee_attendance_date')
    //             ->toArray();

    //         // Prepare the report
    //         $monthly_attendance = [];

    //         for ($day = 1; $day <= $days_count; $day++) {
    //             $currentDate = Carbon::createFromDate($year, $month, $day);
    //             if ($currentDate->isSunday() || $currentDate->greaterThan(Carbon::now())) {
    //                 continue;
    //             }

    //             $dateString = $currentDate->format('Y-m-d');

    //             if (array_key_exists($dateString, $attendance_records)) {
    //                 $record = $attendance_records[$dateString];
    //                 $status = $record['employee_attendance'];
    //             } else {
    //                 $status = 'Absent';
    //                 $record = [
    //                     'department' => $dept_name,
    //                     'job_designation' => '-',
    //                     'start_time' => '-',
    //                     'end_time' => '-',
    //                     'emp_name' => '-',
    //                 ];
    //             }

    //             $monthly_attendance[] = array_merge($record, [
    //                 'employee_attendance_date' => $dateString,
    //                 'employee_attendance' => $status
    //             ]);
    //         }

    //         return view('admin_panel.reporting.employee_attendance.all_monthly_attendance', [
    //             'attendance_records' => $monthly_attendance,
    //             'attendance_date' => $attendance_date,
    //             'days_count' => $days_count,
    //         ]);
    //     } else {
    //         return redirect()->back();
    //     }
    // }

    public function report_employee_monthly_attendance_record(Request $request)
    {
        if (Auth::id()) {
            $dept_name = $request->input('department');
            $attendance_date = $request->input('employee_attendance_date');

            // Extract year and month
            $year = date('Y', strtotime($attendance_date));
            $month = date('m', strtotime($attendance_date));

            // Total working days in the selected month (excluding Sundays)
            $days_in_month = Carbon::createFromDate($year, $month)->daysInMonth;
            $working_days = collect();

            for ($day = 1; $day <= $days_in_month; $day++) {
                $date = Carbon::create($year, $month, $day);
                if (!$date->isSunday()) {
                    $working_days->push($date->format('Y-m-d'));
                }
            }

            // Fetch Present and Leave counts
            $attendance_summary = EmployeeAttendance::select(
                'emp_id',
                'emp_name',
                'department',
                'job_designation',
                DB::raw("SUM(CASE WHEN employee_attendance = 'Present' THEN 1 ELSE 0 END) as total_present"),
                DB::raw("SUM(CASE WHEN employee_attendance = 'Leave' THEN 1 ELSE 0 END) as total_leave")
            )
                ->where('department', $dept_name)
                ->whereYear('employee_attendance_date', $year)
                ->whereMonth('employee_attendance_date', $month)
                ->groupBy('emp_id', 'emp_name', 'department', 'job_designation')
                ->get();

            // Calculate Absent days for each employee
            $attendance_summary->each(function ($attendance) use ($working_days) {
                $total_working_days = $working_days->count();

                $present_days = $attendance->total_present;
                $leave_days = $attendance->total_leave;

                $attendance->total_absent = $total_working_days - ($present_days + $leave_days);
            });

            return view('admin_panel.reporting.employee_attendance.all_monthly_attendance', [
                'attendance_summary' => $attendance_summary,
                'attendance_date' => $attendance_date,
                'days_count' => $working_days,
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
                ->groupBy('department', 'job_designation', 'emp_name', 'employee_attendance_date', 'employee_attendance', 'start_time', 'end_time')
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
