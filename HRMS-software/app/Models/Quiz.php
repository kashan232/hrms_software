<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'admin_or_user_id',
        'department',
        'designation',
        'job_title',
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'right_option',
    ];
    
}
