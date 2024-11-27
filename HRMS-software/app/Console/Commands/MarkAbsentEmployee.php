<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MarkAbsentEmployee extends Command
{
    protected $signature = 'attendance:mark-absent-employee';
    protected $description = 'Mark absent employees who have not marked attendance for the day';

    public function handle()
    {
        // Fetch Employees who haven't marked attendance today
        $missingEmployees = DB::table('employees') // Change table name accordingly
            ->whereNotIn('id', function ($query) {
                $query->select('emp_id')
                    ->from('employee_attendances') // Change table name accordingly
                    ->whereDate('employee_attendance_date', now()->toDateString());
            })->get();

        // Insert "Absent" attendance records for missing Employees
        foreach ($missingEmployees as $employee) {
            DB::table('employee_attendances')->insert([
                'admin_or_user_id' => $employee->admin_or_user_id,
                'emp_id' => $employee->id,
                'emp_name' => $employee->first_name . ' ' . $employee->last_name,
                'employee_attendance_date' => now()->toDateString(),
                'employee_attendance' => 'Absent',
                'start_time' => NULL,
                'end_time' => NULL,
                'department' => $employee->department,
                'job_designation' => $employee->designation,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Log completion message
        if ($missingEmployees->isEmpty()) {
            $this->info('No employees are missing attendance today.');
        } else {
            $this->info('Absent attendance marked for missing employees successfully.');
        }
    }
}
