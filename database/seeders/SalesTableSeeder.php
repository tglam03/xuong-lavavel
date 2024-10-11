<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sale::create([
            'product_id' => 1,
            'quantity' => 2,
            'total_price' => 11000000,
            'tax' => 10
        ]);

        Sale::create([
            'product_id' => 2,
            'quantity' => 3,
            'total_price' => 6600000,
            'tax' => 10
        ]);

        Sale::create([
            'product_id' => 3,
            'quantity' => 1,
            'total_price' => 8800000,
            'tax' => 10
        ]);

        Sale::create([
            'product_id' => 4,
            'quantity' => 1,
            'total_price' => 12800000,
            'tax' => 10
        ]);
    }
}
