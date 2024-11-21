<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function Employeeleaves()
    {
        return $this->hasMany(EmployeeLeave::class, 'employee_id', 'id')
            ->where('usertype', 'employee'); // Filter by manager usertype
    }

}
