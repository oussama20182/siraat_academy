@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; min-height: 80vh; background-color: #f4f7f6; padding: 20px 0;">
    <div style="width: 100%; max-width: 500px; background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); border-top: 5px solid #1abc9c;">
        
        <div style="text-align: center; margin-bottom: 30px;">
            <i class="fas fa-user-plus" style="font-size: 3.5rem; color: #1abc9c; margin-bottom: 10px;"></i>
            <h2 style="color: #2c3e50; margin: 0;">إنشاء حساب جديد</h2>
            <p style="color: #7f8c8d; font-size: 0.9rem; margin-top: 5px;">انضم لطلبة العلم في أكاديمية الصراط المستقيم</p>
        </div>

        <form action="{{ url('/register') }}" method="POST">
            @csrf
            
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: bold;">الاسم الكامل</label>
                <input type="text" name="name" required placeholder="اسمك الثلاثي" 
                    style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; outline: none;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: bold;">البريد الإلكتروني</label>
                <input type="email" name="email" required placeholder="example@mail.com" 
                    style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; outline: none;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: bold;">كلمة المرور</label>
                <input type="password" name="password" required placeholder="********" 
                    style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; outline: none;">
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 8px; color: #34495e; font-weight: bold;">تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" required placeholder="********" 
                    style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; outline: none;">
            </div>

            <button type="submit" style="width: 100%; background: #1abc9c; color: white; border: none; padding: 14px; border-radius: 8px; font-weight: bold; cursor: pointer; font-size: 1.1rem;">
                إنشاء الحساب
            </button>

            <div style="text-align: center; margin-top: 20px; font-size: 0.9rem; color: #7f8c8d;">
                لديك حساب بالفعل؟ <a href="{{ url('/login') }}" style="color: #1abc9c; text-decoration: none; font-weight: bold;">تسجيل الدخول</a>
            </div>
        </form>
    </div>
</div>
@endsection