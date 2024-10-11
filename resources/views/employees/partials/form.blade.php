<form action="{{ isset($employee) ? route('employees.update', $employee->id) : route('employees.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($employee))
        @method('PUT')
    @endif

    <!-- First Name -->
    <div class="form-group">
        <label for="first_name">Tên:</label>
        <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $employee->first_name ?? '') }}" required>
        @error('first_name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Last Name -->
    <div class="form-group">
        <label for="last_name">Họ:</label>
        <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $employee->last_name ?? '') }}" required>
        @error('last_name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Email -->
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email ?? '') }}" required>
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Phone -->
    <div class="form-group">
        <label for="phone">Số điện thoại:</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $employee->phone ?? '') }}">
        @error('phone')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Date of Birth -->
    <div class="form-group">
        <label for="date_of_birth">Ngày sinh:</label>
        <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $employee->date_of_birth ?? '') }}">
        @error('date_of_birth')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Hire Date -->
    <div class="form-group">
        <label for="hire_date">Ngày tuyển dụng:</label>
        <input type="date" name="hire_date" class="form-control" value="{{ old('hire_date', $employee->hire_date ?? '') }}">
        @error('hire_date')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Salary -->
    <div class="form-group">
        <label for="salary">Lương:</label>
        <input type="number" name="salary" class="form-control" value="{{ old('salary', $employee->salary ?? '') }}">
        @error('salary')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Is Active -->
    <div class="form-group">
        <label for="is_active">Hoạt động:</label>
        <select name="is_active" class="form-control">
            <option value="1" {{ (old('is_active', $employee->is_active ?? '') == 1) ? 'selected' : '' }}>Active</option>
            <option value="0" {{ (old('is_active', $employee->is_active ?? '') == 0) ? 'selected' : '' }}>Inactive</option>
        </select>
        @error('is_active')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

{{--    <!-- Department ID -->--}}
{{--    <div class="form-group">--}}
{{--        <label for="department_id">Phòng ban:</label>--}}
{{--        <input type="number" name="department_id" class="form-control" value="{{ old('department_id', $employee->department_id ?? '') }}">--}}
{{--        @error('department_id')--}}
{{--        <div class="text-danger">{{ $message }}</div>--}}
{{--        @enderror--}}
{{--    </div>--}}

{{--    <!-- Manager ID -->--}}
{{--    <div class="form-group">--}}
{{--        <label for="manager_id">Mã quản lý:</label>--}}
{{--        <input type="number" name="manager_id" class="form-control" value="{{ old('manager_id', $employee->manager_id ?? '') }}">--}}
{{--        @error('manager_id')--}}
{{--        <div class="text-danger">{{ $message }}</div>--}}
{{--        @enderror--}}
{{--    </div>--}}

    <!-- Address -->
    <div class="form-group">
        <label for="address">Địa chỉ:</label>
        <input type="text" name="address" class="form-control" value="{{ old('address', $employee->address ?? '') }}">
        @error('address')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Image -->
    <div class="form-group">
        <label for="image">Hình ảnh:</label>
        <input type="file" name="image" class="form-control">
        @if(isset($employee) && $employee->image)
            <img src="{{ Storage::url($employee->image) }}" alt="Employee Image" width="100">
        @endif
        @error('image')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">{{ isset($employee) ? 'Cập nhật' : 'Tạo mới' }}</button>
</form>
