{{--@extends('layouts.app')--}}
@extends('master')
@section('content')
    <div class="container">
        <h1>Thêm mới sinh viên</h1>
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên sinh viên</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="classroom_id">Lớp học</label>
                <select name="classroom_id" id="classroom_id" class="form-control" required>
                    @foreach($classrooms as $classroom)
                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="passport_number">Số hộ chiếu</label>
                <input type="text" name="passport_number" id="passport_number" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="issued_date">Ngày cấp hộ chiếu</label>
                <input type="date" name="issued_date" id="issued_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="expiry_date">Ngày hết hạn hộ chiếu</label>
                <input type="date" name="expiry_date" id="expiry_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Môn học đã đăng ký</label>
                <select name="subjects[]" class="form-control" multiple>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Giữ Ctrl để chọn nhiều môn học.</small>
            </div>

            <button type="submit" class="btn btn-success">Thêm sinh viên</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
