<?php

namespace Database\Seeders;

use App\Models\Passport;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Tạo sinh viên
        $student1 = Student::create(['name' => 'Nguyễn Văn ABCYA', 'email' => 'vana@example.com', 'classroom_id' => 1]);
        $passport1 = Passport::create(['student_id' => $student1->id, 'passport_number' => 'A123456', 'issued_date' => '2022-01-01', 'expiry_date' => '2032-01-01']);
        $student1->subjects()->attach([1, 2]);

        $student2 = Student::create(['name' => 'Trần Thị KKE', 'email' => 'b@example.com', 'classroom_id' => 2]);
        $passport2 = Passport::create(['student_id' => $student2->id, 'passport_number' => 'B654321', 'issued_date' => '2022-05-01', 'expiry_date' => '2032-05-01']);
        $student2->subjects()->attach([2, 3, 4]);
    }
}
