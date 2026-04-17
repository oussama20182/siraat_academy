@extends('layouts.app')

@section('content')
<div style="max-width: 900px; margin: 40px auto; font-family: 'Segoe UI', Arial, sans-serif; color: #333; line-height: 1.6;">
    
    <div style="border-bottom: 2px solid #1abc9c; padding-bottom: 20px; margin-bottom: 40px; text-align: center;">
        <h2 style="color: #2c3e50; font-size: 2rem; margin-bottom: 10px;">النظام الدراسي</h2>
        <p style="color: #7f8c8d;">المنهجية التعليمية لأكاديمية الصراط المستقيم</p>
    </div>

    <div style="margin-bottom: 50px;">
        <h3 style="color: #1abc9c; margin-bottom: 20px;"><i class="fas fa-layer-group"></i> مستويات البرنامج</h3>
        <div style="display: flex; gap: 15px; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 250px; background: #f8f9fa; border: 1px solid #e0e0e0; padding: 20px; border-radius: 8px;">
                <h4 style="margin-top: 0; color: #2c3e50;">1. المستوى التمهيدي</h4>
                <p style="font-size: 0.95rem;">تأسيس متين في الأصول والمتون المختصرة.</p>
            </div>
            <div style="flex: 1; min-width: 250px; background: #f8f9fa; border: 1px solid #e0e0e0; padding: 20px; border-radius: 8px;">
                <h4 style="margin-top: 0; color: #2c3e50;">2. المستوى المتوسط</h4>
                <p style="font-size: 0.95rem;">شرح وتفصيل المسائل الفقهية والعقدية.</p>
            </div>
            <div style="flex: 1; min-width: 250px; background: #f8f9fa; border: 1px solid #e0e0e0; padding: 20px; border-radius: 8px;">
                <h4 style="margin-top: 0; color: #2c3e50;">3. المستوى المتقدم</h4>
                <p style="font-size: 0.95rem;">التمكين العلمي والحصول على الإجازات.</p>
            </div>
        </div>
        <p style="margin-top: 15px; color: #e74c3c; font-weight: bold; font-size: 0.9rem;">* ملاحظة: إتمام المستوى التمهيدي شرط أساسي للانتقال لما بعده.</p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px;">
        
        <div>
            <h3 style="color: #1abc9c;"><i class="fas fa-check-circle"></i> متطلبات الاجتياز</h3>
            <ul style="list-style: none; padding: 0;">
                <li style="padding: 10px 0; border-bottom: 1px solid #eee;"><i class="fas fa-book-open" style="margin-left: 10px; color: #bdc3c7;"></i> دراسة المادة العلمية (مقروءة/مرئية)</li>
                <li style="padding: 10px 0; border-bottom: 1px solid #eee;"><i class="fas fa-edit" style="margin-left: 10px; color: #bdc3c7;"></i> حل الواجبات الخاصة بكل مقرر</li>
                <li style="padding: 10px 0; border-bottom: 1px solid #eee;"><i class="fas fa-file-alt" style="margin-left: 10px; color: #bdc3c7;"></i> دخول الاختبار النهائي للمقرر</li>
                <li style="padding: 10px 0; font-weight: bold; color: #27ae60;"><i class="fas fa-certificate" style="margin-left: 10px;"></i> الحصول على الشهادة والإجازة</li>
            </ul>
        </div>

        <div style="background: #2c3e50; color: white; padding: 30px; border-radius: 12px; text-align: center;">
            <h3 style="margin-top: 0; color: #1abc9c;">التقييم والنجاح</h3>
            <div style="font-size: 3.5rem; font-weight: bold; margin: 15px 0;">60%</div>
            <p>هي درجة النجاح الدنيا في كل مقرر</p>
            <p style="font-size: 0.85rem; color: #bdc3c7; margin-top: 20px;">توزع الدرجات بين الواجبات الدورية والاختبار النهائي</p>
        </div>

    </div>
</div>
@endsection