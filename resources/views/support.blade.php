@extends('layouts.app')

@section('content')
<div style="max-width: 900px; margin: 40px auto; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    
    <div style="text-align: center; margin-bottom: 50px;">
        <h2 style="color: #2c3e50; border-bottom: 3px solid #1abc9c; display: inline-block; padding-bottom: 10px;">مركز الدعم الفني</h2>
        <p style="color: #7f8c8d; margin-top: 15px;">نحن هنا لمساعدتك في حل أي مشكلة تقنية أو استفسار حول البرنامج العلمي</p>
    </div>

    <div style="display: flex; flex-wrap: wrap; gap: 30px;">
        
        <div style="flex: 1; min-width: 300px;">
            <h3 style="color: #2c3e50; margin-bottom: 25px;">تواصل معنا مباشرة</h3>
            
            <div style="display: flex; align-items: center; background: #fff; padding: 15px; border-radius: 10px; margin-bottom: 15px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                <i class="fab fa-telegram" style="font-size: 2rem; color: #0088cc; margin-left: 15px;"></i>
                <div>
                    <h4 style="margin: 0; color: #2c3e50;">تليجرام</h4>
                    <p style="margin: 5px 0 0; font-size: 0.9rem;"><a href="https://t.me/Thissbotjard_bot" style="text-decoration: none; color: #0088cc;">@your_username</a></p>
                </div>
            </div>

            <div style="display: flex; align-items: center; background: #fff; padding: 15px; border-radius: 10px; margin-bottom: 15px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                <i class="fas fa-envelope" style="font-size: 2rem; color: #e74c3c; margin-left: 15px;"></i>
                <div>
                    <h4 style="margin: 0; color: #2c3e50;">البريد الإلكتروني</h4>
                    <p style="margin: 5px 0 0; font-size: 0.9rem;">ouss2oussama@gmail.com
</p>
                </div>
            </div>

            <div style="background: #f8f9fa; padding: 20px; border-radius: 10px; border-right: 4px solid #f1c40f; margin-top: 30px;">
                <h4 style="margin-top: 0; color: #2c3e50;"><i class="fas fa-clock"></i> أوقات العمل</h4>
                <p style="font-size: 0.9rem; color: #7f8c8d; line-height: 1.6;">نستقبل استفساراتكم من السبت إلى الخميس، من الساعة 9 صباحاً وحتى 8 مساءً بتوقيت الجزائر (قسنطينة).</p>
            </div>
        </div>

        <div style="flex: 1.5; min-width: 300px; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
            <h3 style="color: #2c3e50; margin-bottom: 20px;">أرسل لنا رسالة</h3>
            <form>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; color: #34495e;">الاسم الكامل</label>
                    <input type="text" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; color: #34495e;">نوع الاستفسار</label>
                    <select style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;">
                        <option>مشكلة في التسجيل</option>
                        <option>استفسار عن مستوى دراسي</option>
                        <option>طلب إجازة علمية</option>
                        <option>أخرى</option>
                    </select>
                </div>
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 5px; color: #34495e;">نص الرسالة</label>
                    <textarea rows="5" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box;"></textarea>
                </div>
                <button type="button" style="width: 100%; background: #1abc9c; color: white; border: none; padding: 12px; border-radius: 5px; font-weight: bold; cursor: pointer; font-size: 1rem;">إرسال الرسالة</button>
            </form>
        </div>

    </div>
</div>
@endsection