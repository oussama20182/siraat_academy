@extends('layouts.app')
@section('content')
<div style="max-width: 700px; margin: 40px auto; direction: rtl; font-family: 'Cairo', sans-serif;">
    <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; color: #2c3e50;">✍️ واجب: {{ $lesson->title }}</h2>
        <hr style="margin: 20px 0; border: 1px solid #eee;">

        <form action="{{ url('/submit-assignment') }}" method="POST">
            @csrf
            <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
            
            @foreach($questions as $index => $q)
            <div style="margin-bottom: 25px; padding: 15px; background: #f9f9f9; border-radius: 10px;">
                <p style="font-weight: bold; font-size: 1.1rem;">س{{ $index + 1 }}: {{ $q->question_text }}</p>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 10px;">
                    <label><input type="radio" name="answers[{{ $q->id }}]" value="a" required> {{ $q->option_a }}</label>
                    <label><input type="radio" name="answers[{{ $q->id }}]" value="b"> {{ $q->option_b }}</label>
                    <label><input type="radio" name="answers[{{ $q->id }}]" value="c"> {{ $q->option_c }}</label>
                    <label><input type="radio" name="answers[{{ $q->id }}]" value="d"> {{ $q->option_d }}</label>
                </div>
            </div>
            @endforeach

            <button type="submit" style="width: 100%; background: #27ae60; color: white; padding: 15px; border-radius: 10px; border: none; font-size: 1.2rem; cursor: pointer; font-weight: bold;">إرسال الإجابات</button>
        </form>
    </div>
</div>
@endsection