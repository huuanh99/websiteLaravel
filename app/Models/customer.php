<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'city',
        'country',
        'zipcode',
        'phone',
        'email',
        'password'
    ];
    protected $table = 'tbl_customer';

    public function orders()
    {
        return $this->hasMany(order::class, 'customer_id');
    }
}
