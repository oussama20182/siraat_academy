@extends('layouts.app')

@section('content')
<div style="background: linear-gradient(rgba(26, 37, 47, 0.8), rgba(26, 37, 47, 0.8)), url('https://images.unsplash.com/photo-1585036156171-3839efc229b7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; color: white; text-align: center; padding: 100px 20px;">
    <h1 style="font-size: 3rem; margin-bottom: 20px;">أكاديمية الصراط المستقيم</h1>
    <p style="font-size: 1.5rem; max-width: 800px; margin: 0 auto 30px;">نحو فهم صحيح للكتاب والسنة ومنهج سلف الأمة، بأسلوب عصري ومنظم.</p>
    <a href="{{ url('/register') }}" style="background: #1abc9c; color: white; padding: 15px 40px; text-decoration: none; border-radius: 30px; font-weight: bold; font-size: 1.2rem;">انضم إلينا الآن</a>
</div>

<div style="display: flex; justify-content: space-around; padding: 50px 5%; background: white; text-align: center; box-shadow: 0 -5px 15px rgba(0,0,0,0.05); flex-wrap: wrap; gap: 20px;">
    
    <div>
        <h2 style="color: #1abc9c; font-size: 2.5rem; margin-bottom: 5px;">+{{ $studentsCount }}</h2>
        <p style="color: #7f8c8d; font-weight: bold;">طالب وطالبة</p>
    </div>

    <div>
        <h2 style="color: #1abc9c; font-size: 2.5rem; margin-bottom: 5px;">+{{ $coursesCount }}</h2>
        <p style="color: #7f8c8d; font-weight: bold;">دورة شرعية</p>
    </div>

    <div>
        <h2 style="color: #1abc9c; font-size: 2.5rem; margin-bottom: 5px;">+{{ $certificatesCount }}</h2>
        <p style="color: #7f8c8d; font-weight: bold;">شهادة وإجازة</p>
    </div>

</div>

<div style="display: flex; flex-wrap: wrap; padding: 80px 5%; gap: 40px; background: #fdfdfd;">
    <div style="flex: 1; min-width: 300px; background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-top: 5px solid #1abc9c;">
        <h3 style="color: #2c3e50; font-size: 1.8rem;"><i class="fas fa-eye" style="margin-left: 10px;"></i> رؤيتنا</h3>
        <p style="color: #7f8c8d; line-height: 1.8; font-size: 1.1rem;">أن نكون المنصة الرائدة عالمياً في تقديم العلوم الشرعية المؤصلة رقمياً، وتسهيل الوصول للعلماء والمشايخ لطلبة العلم في كل مكان.</p>
    </div>
    <div style="flex: 1; min-width: 300px; background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-top: 5px solid #2980b9;">
        <h3 style="color: #2c3e50; font-size: 1.8rem;"><i class="fas fa-bullseye" style="margin-left: 10px;"></i> أهدافنا</h3>
        <ul style="color: #7f8c8d; line-height: 2; font-size: 1.1rem; padding-right: 20px;">
            <li>نشر العلم الشرعي الصحيح القائم على الدليل.</li>
            <li>توفير بيئة تعليمية تفاعلية بين الطالب والمدرس.</li>
            <li>تيسير دراسة المتون العلمية وشروحاتها.</li>
            <li>إعداد جيل متمكن من أدوات البحث العلمي الشرعي.</li>
        </ul>
    </div>
</div>
@endsection