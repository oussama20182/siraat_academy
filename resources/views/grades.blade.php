@extends('layouts.app')

@section('content')
<div style="max-width: 1100px; margin: 40px auto; padding: 20px; font-family: 'Cairo', sans-serif; direction: rtl;">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h2 style="color: #2c3e50; margin: 0;">كشف درجات الطالب</h2>
            <p style="color: #7f8c8d; margin-top: 5px;">تفاصيل نتائج الواجبات والاختبارات النهائية</p>
        </div>
        <a href="{{ url('/dashboard') }}" style="text-decoration: none; color: #1abc9c; font-weight: bold;">
            <i class="fas fa-arrow-right"></i> العودة للوحة التحكم
        </a>
    </div>

    @php
        $totalAllCoursesScore = 0;
        $activeCoursesCount = 0;
    @endphp

    {{-- حساب الإحصائيات العامة قبل عرض الجدول --}}
    @foreach($courses as $course)
        @php
            $courseLessonsCount = $course->lessons->count();
            if($courseLessonsCount > 0) {
                $courseTotal = 0;
                foreach($course->lessons as $lesson) {
                    $res = $lesson->results->first();
                    $courseTotal += $res ? $res->best_score : 0;
                }
                $courseAvg = ($courseTotal / ($courseLessonsCount * 10)) * 100;
                $totalAllCoursesScore += $courseAvg;
                $activeCoursesCount++;
            }
        @endphp
    @endforeach

    @php 
        $generalAverage = $activeCoursesCount > 0 ? $totalAllCoursesScore / $activeCoursesCount : 0;
    @endphp

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px;">
        <div style="background: white; padding: 20px; border-radius: 12px; border-bottom: 4px solid #3498db; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
            <span style="color: #7f8c8d; font-size: 0.9rem;">متوسط الواجبات العام</span>
            <h3 style="margin: 10px 0; color: #2c3e50;">{{ number_format($generalAverage, 1) }}%</h3>
        </div>
        <div style="background: white; padding: 20px; border-radius: 12px; border-bottom: 4px solid #27ae60; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
            <span style="color: #7f8c8d; font-size: 0.9rem;">الاختبارات النهائية</span>
            <h3 style="margin: 10px 0; color: #2c3e50;">-- / 100</h3>
        </div>
        <div style="background: white; padding: 20px; border-radius: 12px; border-bottom: 4px solid #f1c40f; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
            <span style="color: #7f8c8d; font-size: 0.9rem;">التقدير العام</span>
            <h3 style="margin: 10px 0; color: #2c3e50;">
                @if($generalAverage >= 90) ممتاز @elseif($generalAverage >= 80) جيد جداً @elseif($generalAverage >= 50) مقبول @else لم يحدد بعد @endif
            </h3>
        </div>
    </div>

    <div style="background: white; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse; text-align: right;">
            <thead>
                <tr style="background: #2c3e50; color: white;">
                    <th style="padding: 15px;">المقرر الدراسي</th>
                    <th style="padding: 15px; text-align: center;">درجة الواجبات</th>
                    <th style="padding: 15px; text-align: center;">الاختبار النهائي</th>
                    <th style="padding: 15px; text-align: center;">النسبة</th>
                    <th style="padding: 15px; text-align: center;">الحالة</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                @php
                    $lessonsCount = $course->lessons->count();
                    $totalScore = 0;
                    foreach($course->lessons as $lesson) {
                        $result = $lesson->results->first();
                        $totalScore += $result ? $result->best_score : 0;
                    }
                    $percentage = $lessonsCount > 0 ? ($totalScore / ($lessonsCount * 10)) * 100 : 0;
                @endphp
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 15px; font-weight: bold; color: #2c3e50;">{{ $course->title }}</td>
                    <td style="padding: 15px; text-align: center;">{{ $totalScore }} / {{ $lessonsCount * 10 }}</td>
                    <td style="padding: 15px; text-align: center;">--</td>
                    <td style="padding: 15px; text-align: center; font-weight: bold; color: #3498db;">{{ number_format($percentage, 1) }}%</td>
                    <td style="padding: 15px; text-align: center;">
                        @if($percentage >= 50)
                            <span style="background: #d4edda; color: #155724; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem;">ناجح</span>
                        @else
                            <span style="background: #fff3cd; color: #856404; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem;">قيد الدراسة</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="padding: 30px; text-align: center; color: #7f8c8d;">لا توجد مقررات مسجلة حالياً.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <p style="margin-top: 20px; color: #95a5a6; font-size: 0.85rem;">
        * يتم حساب درجة الواجبات بناءً على متوسط أفضل الدرجات المحققة في دروس المقرر.
    </p>
</div>
@endsection