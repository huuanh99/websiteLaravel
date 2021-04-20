<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'brandName'
    ];
    protected $table = 'tbl_brand';

    public function products()
    {
        return $this->hasMany(product::class, 'brandId');
    }
}
