<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manager extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'admin_or_user_id',
        'first_name',
        'last_name',
        'designation',
        'phone',
        'email',
        'address',
        'manager_gender',
        'user_name',
        'password',
        'created_by'
    ];
}
