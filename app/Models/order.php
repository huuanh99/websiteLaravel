<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'total',
        'name',
        'zipcode',
        'address',
        'phone',
        'email',
        'status',
        'time_order'
    ];
    protected $table = 'tbl_order';

    public function customer()
    {
        return $this->belongsTo(customer::class, 'customer_id', 'id');
    }

    public function orderdetails()
    {
        return $this->hasMany(orderdetails::class, 'order_id', 'id');
    }
}
