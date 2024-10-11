@extends('master')

@section('content')
    <div class="container">
        <h1>Danh Sách Báo Cáo Tài Chính</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>Tháng</th>
                <th>Năm</th>
                <th>Tổng Doanh Thu</th>
                <th>Tổng Chi Phí</th>
                <th>Lợi Nhuận Trước Thuế</th>
                <th>Lợi Nhuận Sau Thuế</th>
                <th>Hành Động</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->month }}</td>
                    <td>{{ $report->year }}</td>
                    <td>{{ number_format($report->total_revenue, 2) }} VNĐ</td>
                    <td>{{ number_format($report->total_expenses, 2) }} VNĐ</td>
                    <td>{{ number_format($report->profit_before_tax, 2) }} VNĐ</td>
                    <td>{{ number_format($report->profit_after_tax, 2) }} VNĐ</td>
                    <td>
                        <a href="{{ route('financial-reports.show', [$report->month, $report->year]) }}" class="btn btn-info">Xem Chi Tiết</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
