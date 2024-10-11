@extends('master')

@section('content')
    <h1>Danh sách Employee

        <a class="btn btn-info" href="{{ route('employees.create') }}">Create Employee</a>
    </h1>

    @if (session()->has('succes') && !session()->get('succes'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    @if (session()->has('succes') && session()->get('succes'))
        <div class="alert alert-info">
            Thao tác thành công!
        </div>
    @endif

    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Department ID</th>
                    <th scope="col">Manager ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Date Of Brith</th>
                    <th scope="col">Hire Date</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Is Active</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $employee)
                    <tr class="">
                        <td scope="row">{{ $employee->id }}</td>
                        <td scope="row">{{ $employee->department_id }}</td>
                        <td scope="row">{{ $employee->manager_id }}</td>
                        <td scope="row">{{ $employee->first_name }}</td>
                        <td scope="row">{{ $employee->last_name }}</td>
                        <td>
                            @if ($employee->image)
                                <img src="{{ Storage::Url($employee->image) }}" width="109px" alt="">
                            @endif
                        </td>
                        <td scope="row">{{ $employee->email }}</td>
                        <td scope="row">{{ $employee->phone }}</td>
                        <td scope="row">{{ $employee->address }}</td>
                        <td scope="row">{{ $employee->date_of_birth }}</td>
                        <td scope="row">{{ $employee->hire_date }}</td>
                        <td scope="row">{{ $employee->salary }}</td>


                        <td scope="row">
                            @if ($employee->is_active)
                                <span class="badge bg-primary">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td scope="row">{{ $employee->created_at }}</td>
                        <td scope="row">{{ $employee->updated_at }}</td>
                        <td>
                            {{-- @TODOAction --}}
                            <a class="btn btn-info mt-2" href="{{ route('employees.show', $employee) }}">SHOW</a>
                            <a class="btn btn-warning mt-2" href="{{ route('employees.edit', $employee) }}">EDIT</a>

                            <form action="{{ route('employees.destroy', $employee) }}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-danger mt-2"
                                    onclick="return confirm('chac chan muon xoa khong')">
                                    DELETE
                                </button>
                            </form>

                            <form action="{{ route('employees.forceDestroy', $employee) }}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-danger mt-2"
                                    onclick="return confirm('chac chan muon xoa khong')">
                                    XC
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $data->links() }}
    </div>
@endsection
