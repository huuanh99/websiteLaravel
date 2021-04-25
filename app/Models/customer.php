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
        'country_id',
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

    public function country(){
        return $this->belongsTo(country::class,'country_id');
    }
}
