@extends('master')

@section('title')
    Show Customer: {{ $customer->name }}
@endsection

@section('content')
    <h1>Show Customer: {{ $customer->name }}</h1>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">NAME DATA</th>
                    <th scope="col">VALUE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer->toArray() as $key => $value)
                    <tr class="">
                        <td scope="row">{{ strtoupper($key) }}</td>
                        <td>
                            @php
                                switch ($key) {
                                    case 'avatar':
                                        if ($value) {
                                            $url = Storage::Url($value);
                                            echo "<img src='$url' width='100px' ";
                                        }
                                        # code...
                                        break;
                                    case 'is_active':
                                        echo $value
                                            ? '<span class="badge bg-primary">YES</span>'
                                            : '<span class="badge bg-danger">NO</span>';
                                        break;
                                    default:
                                        # code...
                                        echo $value;
                                        break;
                                }
                            @endphp
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
