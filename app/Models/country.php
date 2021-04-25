<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone_code',
        'country_code',
        'country_name'
    ];

    public function customers(){
        return $this->hasMany(customer::class, 'country_id');
    }
    protected $table = 'tbl_countries';
}
