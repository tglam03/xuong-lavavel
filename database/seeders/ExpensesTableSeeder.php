<?php

namespace Database\Seeders;

use App\Models\Expense;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Expense::create([
            'type' => 'Chi phí nhập hàng',
            'amount' => 10000000
        ]);

        Expense::create([
            'type' => 'Chi phí vận chuyển',
            'amount' => 3000000
        ]);

        Expense::create([
            'type' => 'Chi phí bảo hành',
            'amount' => 2000000
        ]);

        Expense::create([
            'type' => 'Lương nhân viên',
            'amount' => 3800000
        ]);
    }
}
