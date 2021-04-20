<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'productName',
        'catId',
        'brandId',
        'product_desc',
        'type',
        'price',
        'image'
    ];
    protected $table = 'tbl_product';

    public function brand()
    {
        return $this->belongsTo(brand::class, 'brandId');
    }

    public function category()
    {
        return $this->belongsTo(category::class, 'catId');
    }

    public function orderdetails()
    {
        return $this->hasMany(orderdetails::class, 'product_id');
    }
}
