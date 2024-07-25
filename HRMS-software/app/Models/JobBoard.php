<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobBoard extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    // JobBoard.php
    public function department()
    {
        return $this->belongsTo(Department::class, 'department', 'department');
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplicationForm::class, 'Job_id');
    }
}
