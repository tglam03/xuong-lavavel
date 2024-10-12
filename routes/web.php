<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Buoi1Controller;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FinancialReportController;
use App\Http\Controllers\StudentController;
use App\Models\Customer;
use App\Models\FinancialReport;
use Illuminate\Support\Facades\Auth;
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





##bai 1 buoi 4
Route::get('/movies', function () {
    echo "say hi page movies";
    die;
//    return view('movies');
})->middleware('checkAge');


## bài 2 buổi 4
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
});

Route::group(['middleware' => ['role:employee']], function () {
    Route::get('/orders', function () {
        return view('orders.index');
    });
});

Route::group(['middleware' => ['role:customer']], function () {
    Route::get('/customers', function () {
        return view('customers.show');
    });
});
//test
///admin chỉ dành cho người dùng có vai trò admin.
///orders chỉ dành cho nhân viên.
///customers chỉ dành cho khách hàng.

## end bài 2 buổi 4


Route::get('/', function (){
    return view('welcome');
})->middleware('auth')->name('welcome');


Route::get('auth/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('auth/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendPasswordResetLink']);

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset-password');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword']);


Auth::routes([
    'login' => false,
    'register' => false,
    'reset' => false,
    'verify' => false
]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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


#student
Route::resource('students', StudentController::class);
