@extends('master')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <h1>Báo Cáo Tài Chính Tháng {{ $report->month }}/{{ $report->year }}</h1>
        <table class="table">
            <tr>
                <th>Tổng Doanh Thu</th>
                <td>{{ number_format($report->total_revenue, 2) }} VNĐ</td>
            </tr>
            <tr>
                <th>Tổng Chi Phí</th>
                <td>{{ number_format($report->total_expenses, 2) }} VNĐ</td>
            </tr>
            <tr>
                <th>Lợi Nhuận Trước Thuế</th>
                <td>{{ number_format($report->profit_before_tax, 2) }} VNĐ</td>
            </tr>
            <tr>
                <th>Thuế VAT</th>
                <td>{{ number_format($report->tax_amount, 2) }} VNĐ</td>
            </tr>
            <tr>
                <th>Lợi Nhuận Sau Thuế</th>
                <td>{{ number_format($report->profit_after_tax, 2) }} VNĐ</td>
            </tr>
        </table>
    </div>
@endsection
