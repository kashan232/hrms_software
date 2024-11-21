<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hr extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function leaveEntries()
    {
        return $this->hasMany(EmployeeLeave::class, 'employee_id', 'id')
            ->where('usertype', 'hr'); // Filter by hr usertype
    }

   
}
