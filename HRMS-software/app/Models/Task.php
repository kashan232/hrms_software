<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'admin_or_user_id',
        'usertype',
        'user_name',
        'emp_id',
        'project_name',
        'task_category',
        'start_date',
        'end_date',
        'department',
        'designation',
        'task_assign_person',
        'task_priority',
        'description',
        'status',
        'employee_description'
    ];  
}
