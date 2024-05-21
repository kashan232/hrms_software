<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayrolSalary extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'emp_id',
        'usertype',
        'employee_name',
        'department',
        'designation',
        'salary_month',
        'salary_paid_date',
        'basic_salary',
        'total_allowances',
        'total_deductions',
        'net_salary',
        'allowances',
        'deductions',
        'created_by'
    ];
}
