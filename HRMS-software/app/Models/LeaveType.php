<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'admin_or_user_id',
        'leave_type',
        'usertype'
        
    ];
}
