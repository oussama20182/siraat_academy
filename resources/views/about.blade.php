@extends('layouts.app')

@section('content')
<div style="max-width: 1000px; margin: 0 auto; background: white; padding: 40px; border-radius: 15px; box-shadow: 0 5px 25px rgba(0,0,0,0.05); border-top: 6px solid #1abc9c;">
    
    <div style="text-align: center; margin-bottom: 50px;">
        <h1 style="color: #2c3e50; margin-bottom: 10px;">سيرة المشرف العام</h1>
        <p style="color: #1abc9c; font-size: 1.2rem; font-weight: bold;">من مدينة قسنطينة.. عاصمة العلم والعلماء</p>
        <hr style="width: 100px; border: 2px solid #1abc9c; display: inline-block;">
    </div>

    <section style="margin-bottom: 40px;">
        <h3 style="color: #1abc9c;"><i class="fas fa-info-circle" style="margin-left: 10px;"></i> نبذة عن المشرف</h3>
        <p style="line-height: 1.9; color: #34495e; font-size: 1.1rem; text-align: justify;">
            مشرف استشارات سابق بأكاديمية التفسير والمشرف العام الحالي على "أكاديمية الصراط المستقيم". باحث شرعي مهتم بتحقيق النصوص وصناعة البرامج العلمية، نشأ في رحاب مدينة قسنطينة الجزائرية، تلك المدينة العريقة التي أنجبت كبار العلماء، مما غرس فيه حب التأصيل العلمي والسعي لنشر العقيدة الصحيحة ومنهج سلف الأمة.
        </p>
    </section>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(450px, 1fr)); gap: 30px;">
        
        <section style="background: #f9f9f9; padding: 25px; border-radius: 10px; border-right: 4px solid #3498db;">
            <h3 style="color: #2c3e50;"><i class="fas fa-scroll" style="margin-left: 10px;"></i> الدبلومات والمؤهلات العلمية</h3>
            <ul style="line-height: 2; color: #444;">
                <li>دبلوم الدراسات القرآنية (أكاديمية التفسير).</li>
                <li>دبلوم العلوم الشرعية (أكاديمية إمام الدعوة العلمية).</li>
                <li>دبلوم العلوم الإسلامية (أكاديمية نماء للعلوم الإسلامية والإنسانية).</li>
                <li>دبلوم الإمام والخطيب (أكاديمية البلدة الطيبة العلمية).</li>
                <li>دبلوم حقوق الإنسان في الإسلام (أكاديمية الرواد الإلكترونية).</li>
            </ul>
        </section>

        <section style="background: #f9f9f9; padding: 25px; border-radius: 10px; border-right: 4px solid #e67e22;">
            <h3 style="color: #2c3e50;"><i class="fas fa-users" style="margin-left: 10px;"></i> شيوخ تم تلقي العلم عنهم</h3>
            <p style="font-size: 0.9rem; color: #7f8c8d; margin-bottom: 10px;">(من خلال البرامج العلمية المباشرة والمسجلة):</p>
            <ul style="line-height: 2; color: #444; column-count: 2;">
                <li>سماحة الشيخ عبد العزيز آل الشيخ</li>
                <li>معالي الشيخ سعد بن ناصر الشثري</li>
                <li>معالي الشيخ عبد الكريم الخضير</li>
                <li>معالي الشيخ صالح بن فوزان الفوزان</li>
                <li>فضيلة الشيخ عبد الحكيم العجلان</li>
            </ul>
        </section>

        <section style="background: #f9f9f9; padding: 25px; border-radius: 10px; border-right: 4px solid #27ae60;">
            <h3 style="color: #2c3e50;"><i class="fas fa-award" style="margin-left: 10px;"></i> شهادات تخصصية واجازات</h3>
            <ul style="line-height: 2; color: #444;">
                <li>شهادة في تحقيق النصوص (كلية الشريعة - جامعة أم القرى).</li>
                <li>شهادة الخارطة البحثية الفقهية (جامعة أم القرى).</li>
                <li>دبلوم البرنامج التعليمي بأكاديمية زاد.</li>
                <li>اجتياز برنامج "سلم الاعتقاد" وبرنامج "البناء العلمي".</li>
                <li>شهادة من مؤتمر التدريب الوطني (المعهد العام للإدارة - السعودية).</li>
            </ul>
        </section>

        <section style="background: #f9f9f9; padding: 25px; border-radius: 10px; border-right: 4px solid #9b59b6;">
            <h3 style="color: #2c3e50;"><i class="fas fa-briefcase" style="margin-left: 10px;"></i> الخبرات والبرامج المعدّة</h3>
            <ul style="line-height: 2; color: #444;">
                <li>إعداد برنامج "جرد كتب ابن القيم رحمه الله".</li>
                <li>إعداد دورة "الاستعداد لشهر رمضان" السنوية.</li>
                <li>إعداد برامج علمية في السيرة، الفقه، والتجويد.</li>
            </ul>
        </section>
    </div>
</div>
@endsection