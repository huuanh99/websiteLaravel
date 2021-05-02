<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class customer extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'city',
        'country_id',
        'zipcode',
        'phone',
        'email',
        'password',
        'remember_token',
        'is_activated'
    ];
    protected $table = 'tbl_customer';

    public function orders()
    {
        return $this->hasMany(order::class, 'customer_id');
    }

    public function comments()
    {
        return $this->hasMany(comment::class, 'customer_id');
    }

    public function country(){
        return $this->belongsTo(country::class,'country_id');
    }
}
