<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'adminName',
        'adminEmail',
        'adminPass',
        'level',
        'status',
        'remember_token',
        'is_activated'
    ];
    protected $table = 'tbl_admin';

}
