@extends('master')

@section('title')
    Edit Customer
@endsection

@section('content')
    <h1>Edit New CusTomer</h1>

    {{-- error validate --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- error success --}}
    @if (session()->has('succes') && !session()->get('succes'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    {{-- error success --}}
    @if (session()->has('succes') && session()->get('succes'))
        <div class="alert alert-info">
            Thao tac thanh cong!
        </div>
    @endif
    <div class="container">
        <form action="{{ route('customers.update', $customer) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3 row">
                <label for="name" class="col-4 col-form-label">Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="name" id="name"
                        value="{{ $customer->name }}" />
                </div>
            </div>

            <div class="mb-3 row">
                <label for="address" class="col-4 col-form-label">AddRess</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="address" id="address"
                        value="{{ $customer->address }}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <input type="email" class="form-control" name="email" id="email"
                        value="{{ $customer->email }}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="phone" class="col-4 col-form-label">Phone</label>
                <div class="col-8">
                    <input type="tel" class="form-control" name="phone" id="phone"
                        value="{{ $customer->phone }}" />
                </div>
            </div>
            <div class="mb-3 row">
                <label for="avatar" class="col-4 col-form-label">Avatar</label>
                <div class="col-8">
                    <input type="file" class="form-control" name="avatar" id="avatar" value="" />
                    @if ($customer->avatar)
                        <img src="{{ Storage::Url($customer->avatar) }}" width="109px" alt="">
                    @endif
                </div>
            </div>
            <div class="mb-3 row">
                <label for="is_active" class="col-4 col-form-label">Is Active</label>
                <div class="col-8">
                    <input type="checkbox" class="form-checkbox" @checked($customer->is_active) name="is_active"
                        id="is_active" value="1" />

                </div>
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-4 col-sm-8">
                    <button type="submit" class="btn btn-primary">
                        Action
                    </button>
                </div>
            </div>

        </form>
    </div>
@endsection
