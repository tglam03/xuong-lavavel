
@extends('master')

@section('content')
    <h1>Tạo nhân viên mới</h1>
    @include('employees.partials.form')
@endsection



{{-- @extends('master')--}}

{{--@section('title')--}}
{{--    Create Employee--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--    <h1>Add New Employee</h1>--}}

{{--    --}}{{-- error validate --}}
{{-- @if ($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    --}}{{-- error success --}}
{{-- @if (session()->has('succes') && !session()->get('succes'))--}}
{{--        <div class="alert alert-danger">--}}
{{--            {{ session()->get('error') }}--}}
{{--        </div>--}}
{{--    @endif --}}
{{-- <div class="container">--}}
{{--        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--            @csrf--}}

{{--            <div class="mb-3 row">--}}
{{--                <label for="first_name" class="col-4 col-form-label">First Name</label>--}}
{{--                <div class="col-8">--}}
{{--                    <input type="text" class="form-control" name="first_name" id="first_name"--}}
{{--                        value="{{ old('first_name') }}" />--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="mb-3 row">--}}
{{--                <label for="last_name" class="col-4 col-form-label">Last Name</label>--}}
{{--                <div class="col-8">--}}
{{--                    <input type="text" class="form-control" name="last_name" id="last_name"--}}
{{--                        value="{{ old('last_name') }}" />--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mb-3 row">--}}
{{--                <label for="email" class="col-4 col-form-label">Email</label>--}}
{{--                <div class="col-8">--}}
{{--                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" />--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mb-3 row">--}}
{{--                <label for="phone" class="col-4 col-form-label">Phone</label>--}}
{{--                <div class="col-8">--}}
{{--                    <input type="tel" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" />--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mb-3 row">--}}
{{--                <label for="phone" class="col-4 col-form-label">Salary</label>--}}
{{--                <label for="salary">Lương:</label>--}}
{{--                <input type="number" name="salary" class="form-control"--}}
{{--                    value="{{ old('salary', $employee->salary ?? '') }}" step="0.01">--}}
{{--            </div>--}}
{{--            <div class="mb-3 row">--}}
{{--                <label for="image" class="col-4 col-form-label">Image</label>--}}
{{--                <div class="col-8">--}}
{{--                    <input type="file" class="form-control" name="image" id="image" value="" />--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mb-3 row">--}}
{{--                <label for="is_active" class="col-4 col-form-label">Is Active</label>--}}
{{--                <div class="col-8">--}}
{{--                    <input type="checkbox" class="form-checkbox" name="is_active" id="is_active" value="1" />--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="mb-3 row">--}}
{{--                <div class="offset-sm-4 col-sm-8">--}}
{{--                    <button type="submit" class="btn btn-primary">--}}
{{--                        Action--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </form>--}}
{{--    </div> --}}
{{-- @endsection --}}
{{--@extends('master')--}}

{{--@section('content')--}}
{{--    <h1>{{ isset($employee) ? 'Sửa nhân viên' : 'Tạo nhân viên mới' }}</h1>--}}

{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <form action="{{ isset($employee) ? route('employees.update', $employee) : route('employees.store') }}" method="POST"--}}
{{--        enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--        @if (isset($employee))--}}
{{--            @method('PUT')--}}
{{--        @endif--}}

{{--        <div class="form-group">--}}
{{--            <label for="first_name">Tên:</label>--}}
{{--            <input type="text" name="first_name" class="form-control"--}}
{{--                value="{{ old('first_name', $employee->first_name ?? '') }}" required>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="last_name">Họ:</label>--}}
{{--            <input type="text" name="last_name" class="form-control"--}}
{{--                value="{{ old('last_name', $employee->last_name ?? '') }}" required>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="email">Email:</label>--}}
{{--            <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email ?? '') }}"--}}
{{--                required>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="phone">Số điện thoại:</label>--}}
{{--            <input type="text" name="phone" class="form-control" value="{{ old('phone', $employee->phone ?? '') }}">--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="date_of_birth">Ngày sinh:</label>--}}
{{--            <input type="date" name="date_of_birth" class="form-control"--}}
{{--                value="{{ old('date_of_birth', $employee->date_of_birth ?? '') }}">--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="hire_date">Ngày thuê:</label>--}}
{{--            <input type="date" name="hire_date" class="form-control"--}}
{{--                value="{{ old('hire_date', $employee->hire_date ?? '') }}">--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="salary">Lương:</label>--}}
{{--            <input type="number" name="salary" class="form-control" value="{{ old('salary', $employee->salary ?? '') }}"--}}
{{--                step="0.01">--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="is_active">Trạng thái hoạt động:</label>--}}
{{--            <select name="is_active" class="form-control">--}}
{{--                <option value="1" {{ old('is_active', $employee->is_active ?? 1) == 1 ? 'selected' : '' }}>--}}
{{--                    <span class="badge bg-primary">YES</span>--}}

{{--                </option>--}}
{{--                <option value="0" {{ old('is_active', $employee->is_active ?? 0) == 0 ? 'selected' : '' }}><span--}}
{{--                        class="badge bg-danger">NO</span></option>--}}
{{--            </select>--}}
{{--        </div>--}}

{{--        --}}{{-- <div class="form-group">--}}
{{--            <label for="department_id">Phòng ban:</label>--}}
{{--            <select name="department_id" class="form-control">--}}
{{--                <option value="">Chọn phòng ban</option>--}}
{{--                @foreach ($departments as $department)--}}
{{--                    <option value="{{ $department->id }}"--}}
{{--                        {{ old('department_id', $employee->department_id ?? '') == $department->id ? 'selected' : '' }}>--}}
{{--                        {{ $department->name }}--}}
{{--                    </option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div> --}}
{{--        --}}{{-- --}}
{{--        <div class="form-group">--}}
{{--            <label for="manager_id">Quản lý:</label>--}}
{{--            <select name="manager_id" class="form-control">--}}
{{--                <option value="">Chọn quản lý</option>--}}
{{--                @foreach ($managers as $manager)--}}
{{--                    <option value="{{ $manager->id }}"--}}
{{--                        {{ old('manager_id', $employee->manager_id ?? '') == $manager->id ? 'selected' : '' }}>--}}
{{--                        {{ $manager->first_name }} {{ $manager->last_name }}--}}
{{--                    </option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div> --}}

{{--        <div class="form-group">--}}
{{--            <label for="address">Địa chỉ:</label>--}}
{{--            <textarea name="address" class="form-control">{{ old('address', $employee->address ?? '') }}</textarea>--}}
{{--        </div>--}}

{{--        <div class="form-group">--}}
{{--            <label for="image">Ảnh đại diện:</label>--}}
{{--            <input type="file" name="image" class="form-control">--}}
{{--            @if (isset($employee) && $employee->image)--}}
{{--                <img src="{{ asset('storage/' . $employee->image) }}" alt="Profile Picture" width="100">--}}
{{--            @endif--}}
{{--        </div>--}}

{{--        <button type="submit" class="btn btn-success">{{ isset($employee) ? 'Cập nhật' : 'Tạo mới' }}</button>--}}
{{--    </form>--}}
{{--@endsection--}}
