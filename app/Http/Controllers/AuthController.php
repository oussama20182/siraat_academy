<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // وظيفة تسجيل حساب جديد
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // 1. إنشاء المستخدم
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => 0, 
        ]);

        // 2. تسجيل دخول المستخدم فوراً بعد إنشاء الحساب
        Auth::login($user);

        // 3. التحويل مباشرة إلى لوحة التحكم
        return redirect()->route('dashboard');
    }

    // وظيفة تسجيل الدخول المحدثة للتوجيه إلى لوحة التحكم
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // التحقق من نوع المستخدم بعد الدخول مباشرة
            if (Auth::user()->is_admin == 1) {
                return redirect('/admin/dashboard'); // توجيه للمدير
            }
            return redirect('/dashboard'); // توجيه للطالب
        }

        return back()->with('error', 'بيانات الدخول غير صحيحة');
    }

    // وظيفة تسجيل الخروج
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}