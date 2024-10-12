{{--@extends('layouts.app')--}}
@extends('master')

@section('content')
    <div class="container">
        <h1>Danh sách sinh viên</h1>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Thêm mới sinh viên</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>Lớp học</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->classroom->name }}</td>
                    <td>
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-info">Chi tiết</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Chỉnh sửa</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $students->links() }}
    </div>
@endsection
