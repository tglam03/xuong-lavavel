@extends('master')

@section('content')
    <h1>Danh sách khách hàng

        <a class="btn btn-info" href="{{ route('customers.create') }}">Create Customer</a>
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

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Is Active</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $customer)
                    <tr class="">
                        <td scope="row">{{ $customer->id }}</td>
                        <td scope="row">{{ $customer->name }}</td>
                        <td scope="row">{{ $customer->address }}</td>
                        <td>
                            @if ($customer->avatar)
                                <img src="{{ Storage::Url($customer->avatar) }}" width="109px" alt="">
                            @endif
                        </td>

                        <td scope="row">{{ $customer->email }}</td>
                        <td scope="row">{{ $customer->phone }}</td>

                        <td scope="row">
                            @if ($customer->is_active)
                                <span class="badge bg-primary">YES</span>
                            @else
                                <span class="badge bg-danger">NO</span>
                            @endif
                        </td>
                        <td scope="row">{{ $customer->created_at }}</td>
                        <td scope="row">{{ $customer->updated_at }}</td>
                        <td>
                            {{-- @TODOAction --}}
                            <a class="btn btn-info mt-2" href="{{ route('customers.show', $customer) }}">SHOW</a>
                            <a class="btn btn-warning mt-2" href="{{ route('customers.edit', $customer) }}">EDIT</a>

                            <form action="{{ route('customers.destroy', $customer) }}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-danger mt-2"
                                    onclick="return confirm('chac chan muon xoa khong')">
                                    DELETE
                                </button>
                            </form>

                            <form action="{{ route('customers.forceDestroy', $customer) }}" method="POST">
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
