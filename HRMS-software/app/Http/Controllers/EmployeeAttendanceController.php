<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeAttendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeAttendanceController extends Controller
{



    public function daily_attendance(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $Departments = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.attendance.daily_attendance', [
                'Departments' => $Departments
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function fetch_daily_employee_attendance_record(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $dept_name = $request->input('department');
            $designation = $request->input('designation');
            $attendance_date = $request->input('employee_attendance_date');
            // dd($dept_name,$designation,$attendance_date);

            $attendance_records = EmployeeAttendance::where('department', $dept_name)
                ->where('job_designation', $designation)
                ->where('employee_attendance_date', $attendance_date)
                ->get();

            // dd($attendance_records);
            return view('admin_panel.attendance.fetch_daily_attendance', [
                'attendance_records' => $attendance_records
            ]);
        } else {
            return redirect()->back();
        }
    }


    public function employee_attendance_create()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $Employee = Employee::where('email', '=', $useremail)->first();

            $employeeName = auth()->user()->name;
            $emp_id = Auth()->user()->emp_id;
            $Employeeattendance = EmployeeAttendance::where('emp_id', '=', $emp_id)->where('emp_name', '=', $employeeName)->first();
            // dd($Employeeattendance);
            return view('employee_panel.attendance.create_attendance', [
                'Employee' => $Employee,
                'Employeeattendance' => $Employeeattendance,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function employee_mark_attendance(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $dept_name = $request->input('department');
            $designation = $request->input('designation');
            $start_time = $request->input('start_time');
            $end_time = $request->input('end_time');

            $employee_attendance_date = $request->input('employee_attendance_date');
            $all_employess = Employee::where('email', $useremail)->where('department', $dept_name)->where('designation', $designation)->get();
            $employees_attendance_data = DB::table('employee_attendances')
                ->where('admin_or_user_id', $userId)
                ->where('department', $dept_name)
                ->where('employee_attendance_date', $employee_attendance_date)
                ->pluck('employee_attendance', 'emp_id')
                ->toArray();

            // $Departments = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('employee_panel.attendance.employee_mark_attendance', [
                'dept_name' => $dept_name,
                'employee_attendance_date' => $employee_attendance_date,
                'designation' => $designation,
                'all_employess' => $all_employess,
                'employees_attendance_data' => $employees_attendance_data,
                'start_time' => $start_time,
                'end_time' => $end_time,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function employee_store_attendance(Request $request)
    {

        if (Auth::id()) {
            $userId = Auth::id();
            // dd($request);
            $empIds = $request->input('emp_id');
            $employee_attendance_date = $request->input('employee_attendance_date');
            $empNames = $request->input('emp_name');
            $employees_attendance_data = $request->input('attendance');
            $department = $request->input('department');
            $job_designation = $request->input('job_designation');
            $start_time = $request->input('start_time');
            $end_time = $request->input('end_time');

            foreach ($empIds as $index => $empId) {
                $attendance = $employees_attendance_data[$empId];

                $recordExists = EmployeeAttendance::where('emp_id', $empId)
                    ->where('employee_attendance_date', $employee_attendance_date)
                    ->exists();

                if ($recordExists) {
                    EmployeeAttendance::where('emp_id', $empId)
                        ->where('employee_attendance_date', $employee_attendance_date)
                        ->update([
                            'employee_attendance' => $attendance,
                        ]);
                } else {
                    EmployeeAttendance::create([
                        'admin_or_user_id' => $userId,
                        'emp_id' => $empId,
                        'department' => $department,
                        'job_designation' => $job_designation,
                        'start_time' => $start_time,
                        'end_time' => $end_time,
                        'emp_name' => $empNames[$index],
                        'employee_attendance_date' => $employee_attendance_date,
                        'employee_attendance' => $attendance,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }

            return Redirect()->back()->with('attendance_save', 'Attendance create successfully!');
        } else {
            return redirect()->back();
        }
    }

    public function all_employee_attendance(Request $request)
    {
        if (Auth::id()) {
            $emp_id = Auth::user()->emp_id;
            $employeeName = Auth::user()->name;

            // Fetch employee attendance records with relevant fields
            $attendance_records = EmployeeAttendance::where('emp_id', $emp_id)
                ->where('emp_name', $employeeName)
                ->get(['department', 'job_designation', 'start_time', 'end_time', 'emp_name', 'employee_attendance_date as employee_attendance_date', 'employee_attendance as employee_attendance'])
                ->toArray();

            // Determine current month range
            $startOfMonth = Carbon::now()->startOfMonth();
            $endOfMonth = Carbon::now()->endOfMonth();

            $fullMonthAttendance = [];

            for ($date = $startOfMonth; $date <= $endOfMonth; $date->addDay()) {
                if ($date->isSunday()) {
                    continue;
                }

                $dateString = $date->format('Y-m-d');
                $status = 'Absent';

                foreach ($attendance_records as $record) {
                    if ($record['employee_attendance_date'] === $dateString) {
                        $status = $record['employee_attendance'];
                        break;
                    }
                }

                $fullMonthAttendance[] = [
                    'date' => $dateString,
                    'department' => $record['department'] ?? '-',
                    'job_designation' => $record['job_designation'] ?? '-',
                    'start_time' => $record['start_time'] ?? '-',
                    'end_time' => $record['end_time'] ?? '-',
                    'emp_name' => $record['emp_name'] ?? $employeeName,
                    'employee_attendance_date' => $dateString,
                    'employee_attendance' => $status
                ];
            }

            return view('employee_panel.attendance.employee_fetch_daily_attendance', [
                'attendance_records' => $fullMonthAttendance
            ]);
        } else {
            return redirect()->back();
        }
    }


    public function markIn(Request $request)
    {
        $emp_id = Auth()->user()->emp_id;
        $currentDate = $request->employee_attendance_date;
        $currentTime = $request->start_time;
        $department = $request->department;
        $designation = $request->designation;

        // Check if attendance record already exists for today
        $attendance = EmployeeAttendance::where('emp_id', $emp_id)
            ->whereDate('employee_attendance_date', $currentDate)
            ->first();

        if (!$attendance) {
            // Create attendance record and mark start time
            EmployeeAttendance::create([
                'emp_id' => $emp_id,
                'emp_name' => Auth()->user()->name,
                'employee_attendance_date' => $currentDate,
                'start_time' => $currentTime,
                'employee_attendance' => 'Present',
                'department' => $department,
                'job_designation' => $designation
            ]);

            return response()->json(['success' => 'Attendance marked successfully']);
        }

        return response()->json(['error' => 'Attendance already marked for today'], 400);
    }


    // Controller Method
    public function markOut(Request $request)
    {
        $emp_id = Auth()->user()->emp_id;
        $currentDate = $request->employee_attendance_date;
        $endtime = $request->end_time;

        // Update attendance record with end time
        $attendance = EmployeeAttendance::where('emp_id', $emp_id)
            ->whereDate('employee_attendance_date', $currentDate)
            ->first();

        // If attendance doesn't exist, return error message
        if (!$attendance) {
            return response()->json(['error' => 'No attendance marked today. Kindly check-in first.'], 400);
        }

        $attendance->update([
            'end_time' => $endtime
        ]);
        return response()->json(['success' => 'Attendance marked out successfully']);
    }
}
