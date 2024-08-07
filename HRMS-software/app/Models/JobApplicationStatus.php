<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobApplicationStatus extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function application()
    {
        return $this->belongsTo(JobApplicationForm::class, 'application_id');
    }
    
}
