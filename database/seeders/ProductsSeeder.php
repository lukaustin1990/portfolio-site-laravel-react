<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "name" => "PHP 8",
            "description_short" => "Short description of product 1",
            "description_long" => "Long description of product 1",
            "price" => 199.99
        ]);
    }
}
