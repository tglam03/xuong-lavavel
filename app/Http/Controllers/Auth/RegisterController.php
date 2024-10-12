<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Hiển thị form đăng ký.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register'); // Trả về view đăng ký
    }

    /**
     * Xử lý đăng ký người dùng mới.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Tạo người dùng mới
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Mã hóa mật khẩu
            'role' => $request->role, // Lưu vai trò
        ]);

        // Đăng nhập người dùng sau khi đăng ký thành công
        Auth::login($user);

        // Chuyển hướng người dùng đến trang dashboard
        return redirect()->route('home')->with('success', 'Đăng ký thành công!'); // Thêm thông báo
    }
}
