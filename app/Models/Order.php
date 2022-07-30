<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_cost',
        'order_date',
        'customer_id',
        'employee_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product');
    }
}
