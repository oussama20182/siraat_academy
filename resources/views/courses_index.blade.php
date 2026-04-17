@extends('layouts.app')

@section('content')
<div style="max-width: 1200px; margin: 30px auto; padding: 20px; direction: rtl; font-family: 'Cairo', sans-serif;">
    <h2 style="color: #2c3e50; margin-bottom: 30px; border-right: 5px solid #3498db; padding-right: 15px;">الدورات التدريبية المتاحة</h2>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px;">
        @foreach($specialCourses as $course)
        <div style="background: white; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); overflow: hidden; display: flex; flex-direction: column;">
            <div style="background: #3498db; height: 10px;"></div>
            <div style="padding: 20px; flex-grow: 1;">
                <h4 style="color: #2c3e50; margin-bottom: 10px;">{{ $course->title }}</h4>
                <p style="color: #7f8c8d; font-size: 0.9rem; line-height: 1.6;">{{ $course->description }}</p>
            </div>
            <div style="padding: 15px; background: #f8f9fa; border-top: 1px solid #eee; display: flex; gap: 10px;">
                @auth
                    <a href="{{ url('/course/'.$course->id) }}" style="flex: 1; text-align: center; background: #3498db; color: white; padding: 10px; border-radius: 8px; text-decoration: none; font-size: 0.9rem;">عرض الدروس</a>
                    <a href="{{ url('/quiz/'.$course->id) }}" style="flex: 1; text-align: center; background: #e67e22; color: white; padding: 10px; border-radius: 8px; text-decoration: none; font-size: 0.9rem;">الاختبار النهائي</a>
                @else
                    <a href="{{ route('register') }}" style="flex: 1; text-align: center; background: #1abc9c; color: white; padding: 12px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 1rem;">اشترك الآن مجاناً</a>
                @endauth
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection