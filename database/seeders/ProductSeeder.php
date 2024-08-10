<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'category_product_id' => 1,
            'name' => 'Smartphone',
            'price' => 699.99,
            'image' => 'smartphone.jpg'
        ]);

        Product::create([
            'category_product_id' => 2,
            'name' => 'Book Title',
            'price' => 19.99,
            'image' => 'book.jpg'
        ]);
    }
}

