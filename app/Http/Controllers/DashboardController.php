<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
  public function index()
  {
    return view('login.login');
  }

  public function Login(Request $request)
  {

    $data = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required', 'min:6'],
    ]);

    if (Auth::attempt($data)) {
      if (Auth::user()->status == 0) {
        return redirect('login_view') -> with('success','Tài khoản của bạn đã bị khóa');
        
      }

      if (Auth::user()->role == 'admin') {
        return redirect('admin/products/list-product');
      }


      return redirect('/');
    }

    return back()->withErrors(['email' => 'email không tồn tại'])->withInput();
  }
  public function showRegistrationForm(Request $request)
  {
    return view('user.reiget');
  }

  public function register(Request $request)
  {
    // Validate dữ liệu người dùng nhập vào
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|string|min:6', // confirmed yêu cầu trường password_confirmation phải trùng với password
    ]);

    // Tạo người dùng mới
    $user = User::create(
      $validated // Mã hóa mật khẩu
    );

    // Đăng nhập người dùng ngay sau khi đăng ký
    Auth::login($user);

    // Chuyển hướng người dùng đến trang chủ hoặc dashboard
    return redirect('/'); // Hoặc trang bạn muốn chuyển hướng sau khi đăng ký thành công
  }

  public function logout()
  {
    Auth::logout();
    return redirect()->route('login_view');
  }
}
