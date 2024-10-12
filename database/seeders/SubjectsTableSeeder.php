<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Subject::create(['name' => 'PHP1', 'credits' => 3]);
        Subject::create(['name' => 'SQL', 'credits' => 2]);
        Subject::create(['name' => 'JS', 'credits' => 2]);
        Subject::create(['name' => 'ENGLISH', 'credits' => 3]);
    }
}
