<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\FinancialReport;
use App\Models\Sale;
use App\Models\Tax;
use Illuminate\Http\Request;

class FinancialReportController extends Controller
{
    public function generateMonthlyReport($month, $year)
    {
        // Tính tổng doanh thu
        $totalRevenue = Sale::whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('total_price');

        // Tính tổng chi phí
        $totalExpense = Expense::whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('amount');

        // Lợi nhuận trước thuế
        $profitBeforeTax = $totalRevenue - $totalExpense;

        // Thuế VAT
        $vatRate = Tax::where('type', 'VAT')->value('rate') ?? 0; // Đảm bảo không null
        $tax = $profitBeforeTax * ($vatRate / 100);

        // Lợi nhuận sau thuế
        $profitAfterTax = $profitBeforeTax - $tax;

        // Tạo báo cáo tài chính
//        FinancialReport::updateOrCreate(
//            ['month' => $month, 'year' => $year], // Điều kiện để cập nhật nếu bản ghi đã tồn tại
//            [
//                'total_revenue' => $totalRevenue,
//                'total_expenses' => $totalExpense,
//                'profit_before_tax' => $profitBeforeTax,
//                'tax_amount' => $tax,
//                'profit_after_tax' => $profitAfterTax
//            ]
//        );

        dd([
            'totalRevenue' => $totalRevenue,
            'totalExpense' => $totalExpense,
            'profitBeforeTax' => $profitBeforeTax,
            'tax' => $tax,
            'profitAfterTax' => $profitAfterTax,
        ]);

        return redirect()->route('financial-reports.show', [$month, $year])->with('success', 'Báo cáo tài chính đã được tạo thành công!');
    }

    public function show($month, $year)
    {
        $report = FinancialReport::where('month', $month)->where('year', $year)->first();

        if (!$report) {
            return redirect()->route('financial-reports.index')->with('error', 'Báo cáo không tồn tại.');
        }

        return view('financial_reports.show', compact('report'));
    }
    public function index()
    {
        $reports = FinancialReport::all();
        return view('financial_reports.index', compact('reports'));
    }
}
