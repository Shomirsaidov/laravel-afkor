<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'price',
        'prev_price',
        'quantity',
        'images',
        'category_id',
        'tags',
        'brand'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array',
        'price' => 'decimal:2',
        'prev_price' => 'decimal:2',
    ];


}
