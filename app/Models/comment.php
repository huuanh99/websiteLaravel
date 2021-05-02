<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'product_id',
        'body'
    ];

    public function customer(){
        return $this->belongsTo(customer::class, 'customer_id');
    }

    public function product(){
        return $this->belongsTo(product::class, 'product_id');
    }
    protected $table = 'tbl_comment';
}
