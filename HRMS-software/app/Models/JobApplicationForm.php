<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobApplicationForm extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function statuses()
    {
        return $this->hasMany(JobApplicationStatus::class, 'application_id');
    }

    public function jobBoard()
    {
        return $this->belongsTo(JobBoard::class, 'Job_id');
    }

    
}
