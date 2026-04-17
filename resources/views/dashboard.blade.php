@extends('layouts.app')

@section('content')
<div style="max-width: 1200px; margin: 30px auto; padding: 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; direction: rtl;">
    
    {{-- رأس الصفحة --}}
    <div style="background: white; padding: 25px 35px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin-bottom: 30px; display: flex; align-items: center; justify-content: space-between; border-right: 6px solid #1abc9c; flex-wrap: wrap; gap: 20px;">
        <div>
            <h2 style="color: #2c3e50; margin: 0; font-size: 1.8rem;">لوحة تحكم الطالب</h2>
            <p style="color: #7f8c8d; margin-top: 8px; font-size: 1rem;">مرحباً بك، <strong>{{ Auth::user()->name }}</strong>. واصل رحلتك العلمية بهمة ونشاط.</p>
        </div>
        
        <div style="display: flex; align-items: center; background: #f0faf9; padding: 10px 20px; border-radius: 10px; border: 1px dashed #1abc9c;">
            <i class="fas fa-medal" style="color: #1abc9c; margin-left: 10px;"></i>
            <span style="color: #34495e; font-weight: bold; margin-left: 8px;">المستوى الحالي:</span>
            <span style="color: #1abc9c; font-weight: 900; font-size: 1.1rem;">التمهيدي</span>
        </div>
    </div>

    {{-- أزرار الوصول السريع --}}
    <div style="display: flex; gap: 20px; margin-bottom: 30px; flex-wrap: wrap;">
        <a href="{{ url('/grades') }}" style="flex: 1; min-width: 250px; background: #2c3e50; color: white; padding: 20px; border-radius: 12px; text-decoration: none; text-align: center; transition: 0.3s; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            <i class="fas fa-chart-line" style="font-size: 1.5rem; display: block; margin-bottom: 10px;"></i>
            <strong style="font-size: 1.1rem;">كشف الدرجات</strong>
            <span style="display: block; font-size: 0.8rem; color: #bdc3c7; margin-top: 5px;">نتائج الواجبات والاختبارات</span>
        </a>
        <a href="{{ url('/certificates') }}" style="flex: 1; min-width: 250px; background: #27ae60; color: white; padding: 20px; border-radius: 12px; text-decoration: none; text-align: center; transition: 0.3s; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            <i class="fas fa-certificate" style="font-size: 1.5rem; display: block; margin-bottom: 10px;"></i>
            <strong style="font-size: 1.1rem;">الشهادات والإجازات</strong>
            <span style="display: block; font-size: 0.8rem; color: #d1f2eb; margin-top: 5px;">تحميل شهادات المقررات المكتملة</span>
        </a>
    </div>

    {{-- خريطة البرنامج الدراسي --}}
    <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
        <h3 style="color: #2c3e50; margin-bottom: 25px; border-bottom: 2px solid #f1f1f1; padding-bottom: 15px;">
            <i class="fas fa-graduation-cap" style="margin-left: 10px; color: #1abc9c;"></i> خريطة البرنامج الدراسي
        </h3>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px;">
            
            <div style="border: 2px solid #1abc9c; padding: 25px; border-radius: 15px; position: relative; background: #fafffe; transition: 0.3s;">
                <span style="position: absolute; top: 15px; left: 15px; background: #1abc9c; color: white; font-size: 0.75rem; padding: 3px 10px; border-radius: 5px; font-weight: bold;">متاح الآن</span>
                <h4 style="color: #2c3e50; margin-top: 5px; font-size: 1.2rem;">المستوى التمهيدي</h4>
                <p style="color: #7f8c8d; font-size: 0.95rem; line-height: 1.6;">بداية التأصيل الشرعي وحفظ المتون الأساسية المعتمدة في الأكاديمية.</p>
                <a href="{{ url('/program/introductory') }}" style="display: inline-block; margin-top: 15px; background: #1abc9c; color: white; padding: 10px 25px; border-radius: 8px; text-decoration: none; font-size: 0.95rem; font-weight: bold; box-shadow: 0 4px 10px rgba(26, 188, 156, 0.2);">دخول الدروس</a>
            </div>

            <div style="border: 1px solid #eee; padding: 25px; border-radius: 15px; background: #fcfcfc; position: relative;">
                <i class="fas fa-lock" style="position: absolute; top: 20px; left: 20px; color: #bdc3c7; font-size: 1.2rem;"></i>
                <h4 style="color: #95a5a6; margin-top: 5px; font-size: 1.2rem;">المستوى المتوسط</h4>
                <p style="color: #bdc3c7; font-size: 0.95rem; line-height: 1.6;">يفتح هذا المستوى تلقائياً فور إكمال كافة متطلبات المستوى التمهيدي.</p>
                <button disabled style="margin-top: 15px; background: #bdc3c7; color: white; border: none; padding: 10px 25px; border-radius: 8px; cursor: not-allowed; font-size: 0.95rem;">مغلق حالياً</button>
            </div>

            <div style="border: 1px solid #eee; padding: 25px; border-radius: 15px; background: #fcfcfc; position: relative;">
                <i class="fas fa-lock" style="position: absolute; top: 20px; left: 20px; color: #bdc3c7; font-size: 1.2rem;"></i>
                <h4 style="color: #95a5a6; margin-top: 5px; font-size: 1.2rem;">المستوى المتقدم</h4>
                <p style="color: #bdc3c7; font-size: 0.95rem; line-height: 1.6;">مرحلة التمكين والإجازات العلمية العالية (تفتح بعد إكمال المتوسط).</p>
                <button disabled style="margin-top: 15px; background: #bdc3c7; color: white; border: none; padding: 10px 25px; border-radius: 8px; cursor: not-allowed; font-size: 0.95rem;">مغلق حالياً</button>
            </div>

        </div>
    </div>
</div>
@endsection