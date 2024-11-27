<?php
// app/Console/Commands/MarkAbsentManager.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MarkAbsentManager extends Command
{
    protected $signature = 'attendance:mark-absent-manager';
    protected $description = 'Mark absent managers who have not marked attendance for the day';

    public function handle()
    {
        // Fetch Managers who haven't marked attendance today
        $missingManagers = DB::table('managers') // Change table name accordingly
            ->whereNotIn('id', function ($query) {
                $query->select('emp_id')
                    ->from('mnager_attendances') // Change table name accordingly
                    ->whereDate('employee_attendance_date', now()->toDateString());
            })->get();

        // Insert "Absent" attendance records for missing Managers
        foreach ($missingManagers as $manager) {
            DB::table('mnager_attendances')->insert([
                'admin_or_user_id' => $manager->admin_or_user_id,
                'usertype' => 'Manager',
                'emp_id' => $manager->id,
                'emp_name' => $manager->first_name . ' ' . $manager->last_name,
                'employee_attendance_date' => now()->toDateString(),
                'employee_attendance' => 'Absent',
                'start_time' => NULL,
                'end_time' => NULL,
                'department' => $manager->department,
                'job_designation' => $manager->designation,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Log completion message
        if ($missingManagers->isEmpty()) {
            $this->info('No managers are missing attendance today.');
        } else {
            $this->info('Absent attendance marked for missing managers successfully.');
        }
    }
}
