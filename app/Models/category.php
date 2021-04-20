<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = [
        'catName'
    ];
    protected $table = 'tbl_category';

    public function products()
    {
        return $this->hasMany(product::class, 'catId');
    }
}
