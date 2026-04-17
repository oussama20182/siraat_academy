<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>أكاديمية الصراط المستقيم</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; background-color: #f8f9fa; }
        header { background: #1a252f; color: white; padding: 0.5rem 5%; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 1000; }
        .logo h2 { margin: 0; color: #1abc9c; font-size: 1.5rem; }
        nav ul { list-style: none; display: flex; margin: 0; padding: 0; align-items: center; }
        nav ul li { margin-right: 15px; }
        nav ul li a { color: white; text-decoration: none; font-size: 0.95rem; transition: 0.3s; padding: 8px 12px; border-radius: 4px; }
        nav ul li a:hover { background: #1abc9c; color: white; }
        .auth-buttons { display: flex; gap: 10px; }
        .btn-login { background: transparent; border: 1px solid #1abc9c; color: #1abc9c !important; }
        .btn-register { background: #1abc9c; color: white !important; }
        .content { min-height: 80vh; padding: 40px 5%; }
        footer { background: #1a252f; color: white; text-align: center; padding: 30px 0; margin-top: 50px; }
        .social-links a { color: white; margin: 0 15px; font-size: 1.3rem; transition: 0.3s; }
        .social-links a:hover { color: #1abc9c; }
    </style>
</head>
<body>
<header style="background: #1a2a33; padding: 15px 0; border-bottom: 2px solid #1abc9c;">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 20px; direction: rtl;">
        
        {{-- الشعار --}}
        <div class="logo">
            <h2 style="color: #1abc9c; margin: 0; font-size: 1.6rem; font-weight: bold; font-family: 'Cairo', sans-serif;">أكاديمية الصراط المستقيم</h2>
        </div>

        {{-- القائمة الرئيسية --}}
        <nav>
            <ul style="list-style: none; margin: 0; padding: 0; display: flex; align-items: center; gap: 20px;">
                
                <li><a href="{{ url('/') }}" style="color: white; text-decoration: none; font-family: 'Cairo'; font-size: 1rem;">الرئيسية</a></li>
                
                <li><a href="{{ url('/about') }}" style="color: white; text-decoration: none; font-family: 'Cairo'; font-size: 1rem;">حول الأكاديمية</a></li>
                
                <li><a href="{{ url('/program') }}" style="color: white; text-decoration: none; font-family: 'Cairo'; font-size: 1rem;">البرنامج العلمي</a></li>
                
                <li><a href="{{ url('/system') }}" style="color: white; text-decoration: none; font-family: 'Cairo'; font-size: 1rem;">النظام الدراسي</a></li>

                {{-- قسم الدورات بشكل مميز --}}
                <li>
                    <a href="{{ url('/special-courses') }}" style="background: #1abc9c; color: white; text-decoration: none; font-family: 'Cairo'; font-weight: bold; padding: 8px 15px; border-radius: 5px; font-size: 0.95rem;">
                        <i class="fas fa-chalkboard-teacher"></i> الدورات التدريبية
                    </a>
                </li>

                @auth
                    <li>
                        <a href="{{ url('/dashboard') }}" style="color: #1abc9c; text-decoration: none; font-weight: bold; font-family: 'Cairo'; font-size: 1rem;">لوحة الطالب</a>
                    </li>

                    @if(auth()->user()->is_admin == 1)
                        <li>
                            <a href="{{ url('/admin/dashboard') }}" style="color: #e74c3c; text-decoration: none; font-weight: bold; border: 1px solid #e74c3c; padding: 5px 12px; border-radius: 5px; font-size: 0.9rem;">
                                <i class="fas fa-user-shield"></i> الإدارة
                            </a>
                        </li>
                    @endif

                    <li>
                        <form action="{{ url('/logout') }}" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" style="background: #e74c3c; color: white; border: none; padding: 7px 15px; border-radius: 5px; cursor: pointer; font-family: 'Cairo'; font-size: 0.9rem;">
                                خروج
                            </button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li>
                        <a href="{{ url('/login') }}" style="color: white; text-decoration: none; border: 1px solid #1abc9c; padding: 6px 15px; border-radius: 5px; font-family: 'Cairo'; font-size: 0.9rem;">دخول</a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}" style="background: #1abc9c; color: white; text-decoration: none; padding: 7px 15px; border-radius: 5px; font-family: 'Cairo'; font-size: 0.9rem;">تسجيل</a>
                    </li>
                @endguest
                
            </ul>
        </nav>

    </div>
</header>

<div class="content" style="padding: 20px 0;">
    @yield('content')
</div>

    <footer>
        <p>جميع الحقوق محفوظة &copy; 2026 - أكاديمية الصراط المستقيم</p>
        <div class="social-links">
            <a href="https://t.me/jardelsonah" target="_blank" rel="noopener noreferrer"><i class="fab fa-telegram"></i></a>
            <a href="https://youtube.com/channel/UCuygG4K9vfAXJNFIG0B1Xqg?si=EgrE8iDqI8uQy9cy" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube"></i></a>
        </div>
    </footer>

</body>
</html>