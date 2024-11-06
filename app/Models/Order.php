<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'tel',
        'product_id',
        'quantity',
        'price',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
     
}
