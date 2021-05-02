<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class import extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'price',
        'quantity',
        'note'
    ];
    protected $table = 'tbl_import';

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }
}
