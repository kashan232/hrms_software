<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeAttendance extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'admin_or_user_id',
        'emp_id',
        'emp_name',
        'employee_attendance_date',
        'employee_attendance',
        'start_time',
        'end_time',
        'department',
        'job_designation'
    ];
}
