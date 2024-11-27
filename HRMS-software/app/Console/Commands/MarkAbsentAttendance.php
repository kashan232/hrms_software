<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MarkAbsentAttendance extends Command
{
    protected $signature = 'attendance:mark-absent';
    protected $description = 'Mark employees as absent who have not marked attendance for the day';

    public function handle()
    {
        // Fetch HRs who haven't marked attendance today
        $missingHRs = DB::table('hrs')
            ->whereNotIn('id', function ($query) {
                $query->select('emp_id')
                    ->from('hr_mnager_attendances')
                    ->whereDate('employee_attendance_date', now()->toDateString());
            })
            ->where('hr_status', 'Onsite') // Optional: Filter for active HRs
            ->get();

        // Insert "Absent" attendance records for missing HRs
        foreach ($missingHRs as $hr) {
            DB::table('hr_mnager_attendances')->insert([
                'admin_or_user_id' => $hr->admin_or_user_id,
                'usertype' => 'HR',
                'emp_id' => $hr->id,
                'emp_name' => $hr->first_name . ' ' . $hr->last_name,
                'employee_attendance_date' => now()->toDateString(),
                'employee_attendance' => 'Absent',
                'start_time' => NULL,
                'end_time' => NULL,
                'department' => $hr->department,
                'job_designation' => $hr->designation,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Log completion message
        if ($missingHRs->isEmpty()) {
            $this->info('No HRs are missing attendance today.');
        } else {
            $this->info('Absent attendance marked for missing HRs successfully.');
        }
    }
}
