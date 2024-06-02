<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hr extends Model
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
        'hr_gender',
        'user_name',
        'password'
    ];
}
