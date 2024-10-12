@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Chi tiết sinh viên: {{ $student->name }}</h1>
        <ul class="list-group">
            <li class="list-group-item"><strong>Tên:</strong> {{ $student->name }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $student->email }}</li>
            <li class="list-group-item"><strong>Lớp học:</strong> {{ $student->classroom->name }}</li>
            <li class="list-group-item"><strong>Số hộ chiếu:</strong> {{ $student->passport->passport_number }}</li>
            <li class="list-group-item"><strong>Ngày cấp:</strong> {{ $student->passport->issued_date }}</li>
            <li class="list-group-item"><strong>Ngày hết hạn:</strong> {{ $student->passport->expiry_date }}</li>
            <li class="list-group-item">
                <strong>Môn học đã đăng ký:</strong>
                <ul>
                    @foreach($student->subjects as $subject)
                        <li>{{ $subject->name }}</li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay lại</a>
        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Chỉnh sửa</a>
        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Xóa sinh viên</button>
        </form>
    </div>
@endsection
