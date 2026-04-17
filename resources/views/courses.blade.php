@extends('layouts.app')
@section('content')
<h2 style="text-align: center; color: #2c3e50;">الدورات المتاحة حالياً</h2>
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 30px;">
    <div style="background: white; border: 1px solid #ddd; padding: 20px; border-radius: 10px; text-align: center;">
        <i class="fas fa-book-open" style="font-size: 3rem; color: #1abc9c; margin-bottom: 15px;"></i>
        <h3>دورة شرح كتاب التوحيد</h3>
        <p>مستوى: مبتدئ </p>
        <button style="background: #2c3e50; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">تفاصيل الدورة</button>
    </div>
    </div>
@endsection