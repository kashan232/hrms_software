<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobBoardDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'Job_id', 
        'department', 
        'designation', 
        'job_title', 
        'required_skills', 
        'educational_requirement', 
        'job_description', 
        'job_type', 
        'job_position', 
        'location', 
        'important_notes'
    ];
}
