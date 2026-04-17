@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; min-height: 70vh; background-color: #f4f7f6;">
    <div style="width: 100%; max-width: 400px; background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); border-top: 5px solid #1abc9c;">
        
        <div style="text-align: center; margin-bottom: 30px;">
            <i class="fas fa-user-circle" style="font-size: 4rem; color: #1abc9c; margin-bottom: 10px;"></i>
            <h2 style="color: #2c3e50; margin: 0;">تسجيل الدخول</h2>
            <p style="color: #7f8c8d; font-size: 0.9rem; margin-top: 5px;">مرحباً بك مجدداً في رحاب العلم</p>
        </div>

        <form action="{{ url('/login') }}" method="POST">
            @csrf <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: bold;">البريد الإلكتروني</label>
                <div style="position: relative;">
                    <i class="fas fa-envelope" style="position: absolute; right: 12px; top: 12px; color: #bdc3c7;"></i>
                    <input type="email" name="email" required placeholder="example@mail.com" 
                        style="width: 100%; padding: 12px 40px 12px 12px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; outline: none; transition: 0.3s;">
                </div>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: bold;">كلمة المرور</label>
                <div style="position: relative;">
                    <i class="fas fa-lock" style="position: absolute; right: 12px; top: 12px; color: #bdc3c7;"></i>
                    <input type="password" name="password" required placeholder="********" 
                        style="width: 100%; padding: 12px 40px 12px 12px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; outline: none; transition: 0.3s;">
                </div>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; font-size: 0.85rem;">
                <label style="color: #7f8c8d; cursor: pointer;">
                    <input type="checkbox" name="remember"> تذكرني
                </label>
                <a href="#" style="color: #1abc9c; text-decoration: none;">نسيت كلمة المرور؟</a>
            </div>

            <button type="submit" style="width: 100%; background: #1abc9c; color: white; border: none; padding: 14px; border-radius: 8px; font-weight: bold; cursor: pointer; font-size: 1.1rem; transition: 0.3s;">
                دخول
            </button>

            <div style="text-align: center; margin-top: 25px; font-size: 0.9rem; color: #7f8c8d;">
                ليس لديك حساب؟ <a href="{{ url('/register') }}" style="color: #1abc9c; text-decoration: none; font-weight: bold;">إنشاء حساب جديد</a>
            </div>
        </form>
    </div>
</div>
@endsection