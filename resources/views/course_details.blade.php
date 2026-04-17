@extends('layouts.app')

@section('content')
<div style="max-width: 950px; margin: 30px auto; direction: rtl; font-family: 'Cairo', sans-serif; padding: 0 15px;">
    
    {{-- عنوان المقرر --}}
    <div style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.03); margin-bottom: 30px; border-right: 6px solid #1abc9c;">
        <h2 style="margin: 0; color: #2c3e50; font-size: 1.8rem;">{{ $course->title }}</h2>
        <p style="margin: 10px 0 0 0; color: #7f8c8d; font-size: 0.95rem;">استكمل دروسك وقم بحل الواجبات للحصول على الشهادة.</p>
    </div>

    @foreach($course->lessons as $lesson)
    <div style="background: white; padding: 0; border-radius: 12px; margin-bottom: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); overflow: hidden; border: 1px solid #edf2f7;">
        
        {{-- الجزء العلوي: العنوان والأزرار --}}
        <div style="padding: 20px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
            <div>
                <h4 style="margin: 0; color: #2d3748; font-size: 1.1rem; font-weight: 700;">
                    <i class="fas fa-play-circle" style="color: #3498db; margin-left: 8px;"></i>
                    {{ $lesson->title }}
                </h4>
            </div>
            
            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                {{-- زر الفيديو --}}
                <a href="{{ $lesson->video_url }}" target="_blank" class="lesson-btn" style="background: #ebf8ff; color: #2b6cb0;">
                    <i class="fas fa-video"></i> مشاهدة
                </a>
                
                {{-- زر PDF --}}
                <a href="#" class="lesson-btn" style="background: #fff5f5; color: #c53030;">
                    <i class="fas fa-file-pdf"></i> PDF
                </a>

                {{-- زر الواجب --}}
                <button onclick="window.location.href='{{ url('/assignment/' . $lesson->id) }}'" 
                        class="lesson-btn" 
                        style="background: #f0fff4; color: #2f855a; border: 1px solid #c6f6d5; cursor: pointer;">
                    <i class="fas fa-edit"></i> بدء الواجب
                </button>
            </div>
        </div>

        {{-- الجزء السفلي: إحصائيات الطالب (تظهر فقط إذا بدأت المحاولات) --}}
        @php
            $userResult = $lesson->results()->where('user_id', auth()->id())->first();
        @endphp

        @if($userResult)
        <div style="background: #f8fafc; padding: 12px 20px; border-top: 1px solid #edf2f7; display: flex; align-items: center; gap: 20px;">
            <div style="font-size: 0.85rem; color: #64748b;">
                <i class="fas fa-history" style="margin-left: 5px;"></i>
                المحاولات المستهلكة: <strong>{{ $userResult->attempts }} / 10</strong>
            </div>

            <div style="width: 1px; height: 15px; background: #cbd5e1;"></div>

            <div style="font-size: 0.85rem; color: #64748b;">
                <i class="fas fa-award" style="margin-left: 5px;"></i>
                أفضل درجة: 
                <span style="display: inline-block; padding: 2px 12px; border-radius: 12px; font-weight: bold; background: {{ $userResult->best_score >= 5 ? '#dcfce7' : '#fee2e2' }}; color: {{ $userResult->best_score >= 5 ? '#166534' : '#991b1b' }};">
                    {{ $userResult->best_score }} / 10
                </span>
            </div>

            @if($userResult->is_completed)
            <div style="margin-right: auto; color: #059669; font-weight: bold; font-size: 0.85rem;">
                <i class="fas fa-check-double"></i> مكتمل بنجاح
            </div>
            @endif
        </div>
        @endif
    </div>
    @endforeach

    @if($course->lessons->count() == 0)
        <div style="text-align: center; padding: 50px; background: #f9fafb; border-radius: 15px; color: #9ca3af;">
            <i class="fas fa-folder-open" style="font-size: 3rem; margin-bottom: 15px; display: block;"></i>
            <p>لا توجد دروس مضافة لهذا المقرر حتى الآن.</p>
        </div>
    @endif
</div>

<style>
    .lesson-btn {
        padding: 8px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        transition: all 0.2s;
        border: none;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .lesson-btn:hover {
        transform: translateY(-2px);
        filter: brightness(0.95);
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
</style>
@endsection