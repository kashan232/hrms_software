<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'admin_or_user_id',
        'first_name',
        'last_name',
        'email',
        'joining_date',
        'phone',
        'department',
        'designation',
        'decided_salary',
        'reporting_manager',
        'employee_status',
        'address',
        'employee_gender',
        'number_of_leaves',
        'username',
        'password'
    ];
}
