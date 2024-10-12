<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('classroom', 'passport', 'subjects')->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        return view('students.create', compact('classrooms', 'subjects'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'classroom_id' => 'required|exists:classrooms,id',
            'passport_number' => 'required|string|max:255',
            'issued_date' => 'required|date',
            'expiry_date' => 'required|date|after:issued_date',
            'subjects' => 'array',
        ]);

        $student = Student::create($validatedData);
        $student->passport()->create($request->only(['passport_number', 'issued_date', 'expiry_date']));

        if ($request->has('subjects')) {
            $student->subjects()->attach($request->subjects);
        }

        return redirect()->route('students.index')->with('success', 'Sinh viên đã được thêm thành công.');
    }

    public function show(Student $student)
    {
        $student->load('classroom', 'passport', 'subjects');
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        return view('students.edit', compact('student', 'classrooms', 'subjects'));
    }

    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . $student->id,
            'classroom_id' => 'required|exists:classrooms,id',
            'passport_number' => 'required|string|max:255',
            'issued_date' => 'required|date',
            'expiry_date' => 'required|date|after:issued_date',
            'subjects' => 'array',
        ]);

        $student->update($validatedData);
        $student->passport()->update($request->only(['passport_number', 'issued_date', 'expiry_date']));

        if ($request->has('subjects')) {
            $student->subjects()->sync($request->subjects);
        }

        return redirect()->route('students.index')->with('success', 'Thông tin sinh viên đã được cập nhật thành công.');
    }

    public function destroy(Student $student)
    {
        $student->passport()->delete();
        $student->subjects()->detach();
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Sinh viên đã được xóa thành công.');
    }
}
