<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_product_id', 'name', 'price', 'image'];

    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class);
    }
}

