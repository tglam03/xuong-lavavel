<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create(['name' => 'Bàn gỗ', 'price' => 5000000]);
        Product::create(['name' => 'Ghế xoay', 'price' => 2000000]);
        Product::create(['name' => 'Tủ quần áo', 'price' => 8000000]);
        Product::create(['name' => 'Giường ngủ', 'price' => 12000000]);
    }
}
