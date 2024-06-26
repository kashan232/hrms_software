<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'admin_or_user_id',
        'usertype',
        'date',
        'description',
        'vendor',
        'amount',
        'tax',
        'total_paid',
        'status',
    ];
}
