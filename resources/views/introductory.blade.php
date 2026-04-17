@extends('layouts.app')
@section('content')
<div style="background: #f4f7f6; min-height: 100vh; padding: 50px 20px; direction: rtl;">
    <h1 style="text-align: center; color: #2c3e50; margin-bottom: 50px;">📚 المقررات الدراسية - المستوى التمهيدي</h1>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; max-width: 1200px; margin: 0 auto;">
        @foreach($courses as $course)
            <div style="background: white; border-radius: 20px; padding: 30px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-top: 6px solid #1abc9c;">
                <div style="font-size: 50px; margin-bottom: 20px;">📖</div>
                <h3 style="color: #2c3e50; margin-bottom: 15px;">{{ $course->title }}</h3>
                <p style="color: #7f8c8d; font-size: 0.9rem; line-height: 1.6;">{{ $course->description }}</p>
                <div style="margin: 20px 0; color: #1abc9c; font-weight: bold;">عدد الدروس: {{ $course->lessons_count }}</div>
                <a href="{{ url('/course/'.$course->id) }}" style="display: inline-block; background: #1abc9c; color: white; padding: 12px 30px; border-radius: 50px; text-decoration: none; font-weight: bold; transition: 0.3s;">دخول المقرر</a>
            </div>
        @endforeach
    </div>
</div>
@endsection