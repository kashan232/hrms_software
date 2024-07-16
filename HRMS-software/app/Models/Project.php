<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'admin_or_user_id',
        'usertype',
        'user_name',
        'project_name',
        'project_deadline',
        'project_category',
        'project_start_date',
        'project_end_date',
        'budget',
        'priority',
        'description',
        'status',
        'is_completed'
        
    ];
}
