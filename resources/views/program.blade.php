@extends('layouts.app')

@section('content')
<div style="max-width: 1000px; margin: 40px auto; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    
    <div style="text-align: center; margin-bottom: 50px;">
        <h2 style="color: #2c3e50; border-bottom: 3px solid #1abc9c; display: inline-block; padding-bottom: 10px;">البرنامج العلمي للأكاديمية</h2>
        <p style="color: #7f8c8d; margin-top: 15px;">منهجية شاملة مصممة لبناء طالب العلم شرعياً وفكرياً</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(450px, 1fr)); gap: 30px;">
        
        <div style="background: white; border: 1px solid #eee; padding: 25px; border-radius: 12px; border-right: 5px solid #1abc9c;">
            <h3 style="color: #1abc9c;"><i class="fas fa-quran" style="margin-left: 10px;"></i> مسار الوحيين</h3>
            <p style="color: #34495e;">يركز هذا المسار على تدبر آيات الكتاب العزيز ودراسة أصول التفسير، مع شرح جوامع كلم النبي ﷺ من الصحاح والسنن.</p>
        </div>

        <div style="background: white; border: 1px solid #eee; padding: 25px; border-radius: 12px; border-right: 5px solid #2980b9;">
            <h3 style="color: #2980b9;"><i class="fas fa-gavel" style="margin-left: 10px;"></i> مسار التأصيل الفقهي</h3>
            <p style="color: #34495e;">دراسة شاملة للعبادات والمعاملات، مع التركيز على الخارطة البحثية الفقهية لتمكين الطالب من فهم استنباط الأحكام.</p>
        </div>

        <div style="background: white; border: 1px solid #eee; padding: 25px; border-radius: 12px; border-right: 5px solid #e67e22;">
            <h3 style="color: #e67e22;"><i class="fas fa-mosque" style="margin-left: 10px;"></i> مسار العقيدة والتوحيد</h3>
            <p style="color: #34495e;">دراسة متون العقيدة الصحيحة (سلم الاعتقاد) وترسيخ أصول الإيمان وفق منهج أهل السنة والجماعة.</p>
        </div>

        <div style="background: white; border: 1px solid #eee; padding: 25px; border-radius: 12px; border-right: 5px solid #9b59b6;">
            <h3 style="color: #9b59b6;"><i class="fas fa-heart" style="margin-left: 10px;"></i> مسار التزكية والرقائق</h3>
            <p style="color: #34495e;">تهذيب النفوس من خلال كنوز كتب ابن القيم رحمه الله، ودروس السيرة النبوية التي تعمق محبة النبي ﷺ.</p>
        </div>

    </div>

    <div style="margin-top: 50px; background: #fdfdfd; padding: 30px; border-radius: 10px; text-align: center; border: 1px dashed #ccc;">
        <h4 style="color: #2c3e50;">المنهجية المتبعة</h4>
        <p style="color: #7f8c8d; max-width: 700px; margin: 0 auto; line-height: 1.8;">
            يعتمد البرنامج على **التدرج العلمي**، حيث يبدأ الطالب بمتون صغار العلم قبل كباره، مع التركيز على الحفظ والفهم والضبط، ومتابعة دورية من المشرفين لضمان جودة التحصيل العلمي.
        </p>
    </div>

</div>
@endsection