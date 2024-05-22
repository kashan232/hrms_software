<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveRequest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'admin_or_user_id',
        'usertype',
        'department',
        'designation',
        'Employee',
        'leave_type',
        'leave_from_date',
        'leave_to_date',
        'leave_reason',
        'leave_approve'
    ];

}
