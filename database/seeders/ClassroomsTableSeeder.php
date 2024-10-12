<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Classroom::create(['name' => 'Lớp WD8386', 'teacher_name' => 'Sư Phụ']);
        Classroom::create(['name' => 'Lớp WD6666', 'teacher_name' => 'Sư Phụ 2']);
        Classroom::create(['name' => 'Lớp WD6789', 'teacher_name' => 'Sư Phụ 3']);
        Classroom::create(['name' => 'Lớp WD8888', 'teacher_name' => 'Sư Phụ 4']);
        Classroom::create(['name' => 'Lớp WD9999', 'teacher_name' => 'Sư Phụ 5']);
    }
}
