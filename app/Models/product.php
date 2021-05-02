<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'productName',
        'status',
        'catId',
        'brandId',
        'quantity',
        'product_desc',
        'type',
        'price',
        'oldprice',
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

    public function comments()
    {
        return $this->hasMany(comment::class, 'product_id');
    }

    public function imports()
    {
        return $this->hasMany(import::class, 'product_id');
    }
}
