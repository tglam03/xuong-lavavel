@extends('master')
@section('content')
    <h1 class="text-center">Welcome my WEB</h1>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Đăng xuất</button>
    </form>
@endsection
