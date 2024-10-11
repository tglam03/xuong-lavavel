<?php

use App\Http\Controllers\Buoi1Controller;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FinancialReportController;
use App\Models\Customer;
use App\Models\FinancialReport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::resource('buoi1', Buoi1Controller::class);

//buoi2
//Route::get('/financial-reports', function () {
//    $reports = FinancialReport::all();
//    return view('financial_reports.index', compact('reports'));
//});

// Route cho việc tạo báo cáo
Route::get('/financial-reports/generate/{month}/{year}', [FinancialReportController::class, 'generateMonthlyReport'])->name('financial-reports.generate');

// Route cho việc hiển thị báo cáo
Route::get('/financial-reports/{month}/{year}', [FinancialReportController::class, 'show'])->name('financial-reports.show');

// Route cho danh sách báo cáo
Route::get('/financial-reports', [FinancialReportController::class, 'index'])->name('financial-reports.index');

Route::get('/', function () {
    return view('welcome');
});


// customers
Route::resource('customers', CustomerController::class);

Route::delete('customers/{customer}/forceDestroy', [CustomerController::class, 'forceDestroy'])
    ->name('customers.forceDestroy');
//end  customers



//empolyee
Route::resource('employees', EmployeeController::class);

Route::delete('employees/{employee}/forceDestroy', [EmployeeController::class, 'forceDestroy'])
->name('employees.forceDestroy');
// endempolyee



Route::get('session', function () {});
