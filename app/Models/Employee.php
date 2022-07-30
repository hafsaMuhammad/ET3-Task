<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'position'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'employee_id');
    }
}
