<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manager extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];


    public function ManagerLeaves()
    {
        return $this->hasMany(EmployeeLeave::class, 'employee_id', 'id')
            ->where('usertype', 'manager'); // Filter by manager usertype
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'asign_managers', 'id');
    }
    
}
