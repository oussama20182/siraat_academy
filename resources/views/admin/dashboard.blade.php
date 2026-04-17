@extends('layouts.app')

@section('content')
<div style="max-width: 1200px; margin: 30px auto; padding: 20px; direction: rtl; font-family: 'Cairo', sans-serif;">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h2 style="color: #2c3e50; margin: 0;">لوحة تحكم المدير العام</h2>
        <span style="background: #e74c3c; color: white; padding: 5px 15px; border-radius: 50px; font-size: 0.9rem;">وضع الإدارة نشط</span>
    </div>

    {{-- بطاقات الإحصائيات --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 40px;">
        <div style="background: #1abc9c; color: white; padding: 20px; border-radius: 10px; text-align: center; box-shadow: 0 4px 10px rgba(26, 188, 156, 0.3);">
            <i class="fas fa-users" style="font-size: 2rem; margin-bottom: 10px;"></i>
            <h3 style="margin: 5px 0; font-size: 1.8rem;">{{ $studentsCount }}</h3>
            <p style="margin: 0; opacity: 0.9;">الطلاب المسجلين</p>
        </div>
        <div style="background: #3498db; color: white; padding: 20px; border-radius: 10px; text-align: center; box-shadow: 0 4px 10px rgba(52, 152, 219, 0.3);">
            <i class="fas fa-book-open" style="font-size: 2rem; margin-bottom: 10px;"></i>
            <h3 style="margin: 5px 0; font-size: 1.8rem;">{{ $lessonsCount }}</h3>
            <p style="margin: 0; opacity: 0.9;">الدروس المرفوعة</p>
        </div>
        <div style="background: #f1c40f; color: white; padding: 20px; border-radius: 10px; text-align: center; box-shadow: 0 4px 10px rgba(241, 196, 15, 0.3);">
            <i class="fas fa-tasks" style="font-size: 2rem; margin-bottom: 10px;"></i>
            <h3 style="margin: 5px 0; font-size: 1.8rem;">{{ $assignmentsCount }}</h3>
            <p style="margin: 0; opacity: 0.9;">واجبات منشورة</p>
        </div>
        <div style="background: #e74c3c; color: white; padding: 20px; border-radius: 10px; text-align: center; box-shadow: 0 4px 10px rgba(231, 76, 60, 0.3);">
            <i class="fas fa-graduation-cap" style="font-size: 2rem; margin-bottom: 10px;"></i>
            <h3 style="margin: 5px 0; font-size: 1.8rem;">0</h3>
            <p style="margin: 0; opacity: 0.9;">اختبارات نهائية</p>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1.5fr; gap: 30px;">
        {{-- نموذج إضافة مقرر جديد --}}
        <div style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); height: fit-content;">
            <h3 style="border-bottom: 2px solid #f1f1f1; padding-bottom: 10px; color: #2c3e50;">إضافة مقرر جديد</h3>
            <form action="{{ url('/admin/courses') }}" method="POST" style="margin-top: 20px;">
                @csrf
                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 8px; color: #7f8c8d;">اسم المقرر:</label>
                    <input type="text" name="title" required style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd;">
                </div>
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; color: #7f8c8d;">المستوى الدراسي:</label>
                    <select name="level" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ddd; background: white;">
                        <option value="introductory">المستوى التمهيدي</option>
                        <option value="intermediate">المستوى المتوسط</option>
                        <option value="advanced">المستوى المتقدم</option>
                    </select>
                </div>
                <button type="submit" style="background: #1abc9c; color: white; border: none; padding: 12px; border-radius: 8px; cursor: pointer; width: 100%; font-weight: bold;">نشر المقرر الآن</button>
            </form>
        </div>

        {{-- جدول المقررات --}}
        <div style="background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
            <h3 style="border-bottom: 2px solid #f1f1f1; padding-bottom: 10px; color: #2c3e50;">المقررات المنشورة</h3>
            <div style="overflow-x: auto;">
                <table style="width: 100%; margin-top: 15px; text-align: right; border-collapse: collapse;">
                    <thead>
                        <tr style="color: #7f8c8d; font-size: 0.9rem; border-bottom: 2px solid #eee;">
                            <th style="padding: 10px;">المقرر</th>
                            <th style="padding: 10px;">المستوى</th>
                            <th style="padding: 10px; text-align: center;">الدروس</th>
                            <th style="padding: 10px; text-align: center;">إدارة المحتوى</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr style="border-bottom: 1px solid #f9f9f9;">
                            <td style="padding: 15px 10px; font-weight: bold;">{{ $course->title }}</td>
                            <td style="padding: 15px 10px;">
                                <span style="font-size: 0.85rem; background: #f0f0f0; padding: 2px 8px; border-radius: 4px;">
                                    {{ $course->level == 'introductory' ? 'تمهيدي' : ($course->level == 'intermediate' ? 'متوسط' : 'متقدم') }}
                                </span>
                            </td>
                            <td style="padding: 15px 10px; text-align: center; color: #1abc9c; font-weight: bold;">{{ $course->lessons_count }}</td>
                            <td style="padding: 15px 10px; text-align: center;">
                                <div style="display: flex; gap: 8px; justify-content: center; align-items: center;">
    {{-- الزر الأزرق: إضافة درس --}}
    <button onclick="openLessonModal({{ $course->id }})" title="إضافة درس" style="background: #3498db; color: white; border: none; width: 32px; height: 32px; border-radius: 6px; cursor: pointer;">
        <i class="fas fa-video"></i>
    </button>

    {{-- الزر الأصفر: إضافة واجب --}}
    <button onclick="openQuestionModal({{ $course->id }})" title="إضافة واجب" style="background:#f1c40f; color:white; border:none; width: 32px; height: 32px; border-radius: 6px; cursor: pointer;">
        <i class="fas fa-file-alt"></i>
    </button>

    {{-- الزر البرتقالي: إضافة اختبار --}}
    <button onclick="openQuizModal({{ $course->id }})" title="إضافة اختبار" style="background: #e67e22; color: white; border: none; width: 32px; height: 32px; border-radius: 6px; cursor: pointer;">
        <i class="fas fa-pen-fancy"></i>
    </button>

    {{-- زر الحذف الأحمر --}}
    <form action="{{ url('/admin/courses/'.$course->id) }}" method="POST" style="display:inline; margin:0;" onsubmit="return confirm('هل أنت متأكد من حذف هذا المقرر وكل دروسه؟')">
        @csrf
        @method('DELETE')
        <button type="submit" title="حذف المقرر" style="background: #e74c3c; color: white; border: none; width: 32px; height: 32px; border-radius: 6px; cursor: pointer; display: flex; align-items: center; justify-content: center;">
            <i class="fas fa-trash" style="font-size: 0.9rem;"></i>
        </button>
    </form>
</div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- جدول نتائج الطلاب --}}
    <div style="margin-top: 40px; background: white; padding: 25px; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.08);">
        <h3 style="margin-bottom: 20px; color: #2c3e50; border-bottom: 2px solid #f1f2f6; padding-bottom: 15px;">
            <i class="fas fa-poll-h" style="color: #f1c40f; margin-left: 10px;"></i>آخر نتائج واجبات الطلاب
        </h3>
        <table style="width: 100%; border-collapse: collapse; text-align: right;">
            <thead>
                <tr style="background: #f8f9fa; color: #34495e;">
                    <th style="padding: 15px;">الطالب</th>
                    <th style="padding: 15px;">المقرر والدرس</th>
                    <th style="padding: 15px; text-align: center;">الدرجة</th>
                    <th style="padding: 15px; text-align: center;">المحاولات</th>
                    <th style="padding: 15px; text-align: center;">التاريخ</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentResults as $result)
                <tr style="border-bottom: 1px solid #f1f1f1;">
                    <td style="padding: 15px;"><strong>{{ $result->user->name }}</strong></td>
                    <td style="padding: 15px;">{{ $result->lesson->course->title }} - {{ $result->lesson->title }}</td>
                    <td style="padding: 15px; text-align: center;">
                        <span style="padding: 5px 12px; border-radius: 15px; background: {{ $result->best_score >= 5 ? '#d4edda' : '#f8d7da' }}; color: {{ $result->best_score >= 5 ? '#155724' : '#721c24' }};">
                            {{ $result->best_score }} / 10
                        </span>
                    </td>
                    <td style="padding: 15px; text-align: center;">{{ $result->attempts }}</td>
                    <td style="padding: 15px; text-align: center; color: #95a5a6;">{{ $result->updated_at->diffForHumans() }}</td>
                </tr>
                @empty
                <tr><td colspan="5" style="padding: 20px; text-align: center; color: #999;">لا توجد نتائج حالياً</td></tr>
                @endforelse
            </tbody>
        </table>
          
        {{-- قسم إدارة اشتراكات الطلاب ودرجاتهم --}}
<div style="margin-top: 50px; background: white; padding: 25px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); direction: rtl; font-family: 'Cairo';">
    <h3 style="color: #2c3e50; border-right: 5px solid #3498db; padding-right: 15px; margin-bottom: 25px;">
        سجل اشتراكات الطلاب والدرجات النهائية
    </h3>
    
    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #f8f9fa; text-align: right;">
                <th style="padding: 15px; border-bottom: 2px solid #eee;">اسم الطالب</th>
                <th style="padding: 15px; border-bottom: 2px solid #eee;">الدورة التدريبية</th>
                <th style="padding: 15px; border-bottom: 2px solid #eee; text-align: center;">متوسط الواجبات</th>
                <th style="padding: 15px; border-bottom: 2px solid #eee; text-align: center;">الاختبار النهائي</th>
                <th style="padding: 15px; border-bottom: 2px solid #eee; text-align: center;">الحالة</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrollments as $enrollment)
            <tr style="border-bottom: 1px solid #f1f1f1;">
                <td style="padding: 15px;"><strong>{{ $enrollment->user->name }}</strong></td>
                <td style="padding: 15px; color: #3498db;">{{ $enrollment->course->title }}</td>
                <td style="padding: 15px; text-align: center;">
                    <span style="background: #e1f5fe; padding: 4px 10px; border-radius: 5px;">{{ $enrollment->assignment_avg }}%</span>
                </td>
                <td style="padding: 15px; text-align: center;">
                    <span style="font-weight: bold; color: {{ $enrollment->final_exam_score >= 50 ? '#27ae60' : '#e74c3c' }}">
                        {{ $enrollment->final_exam_score ?? 'لم يختبر' }}
                    </span>
                </td>
                <td style="padding: 15px; text-align: center;">
                    @if($enrollment->final_exam_score >= 50)
                        <span style="color: white; background: #2ecc71; padding: 3px 8px; border-radius: 4px; font-size: 0.8rem;">ناجح</span>
                    @else
                        <span style="color: #7f8c8d; background: #eee; padding: 3px 8px; border-radius: 4px; font-size: 0.8rem;">قيد الدراسة</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
</div>

{{-- جميع النوافذ المنبثقة (Modals) --}}
<div id="lessonModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('lessonModal')">&times;</span>
        <h3>إضافة درس جديد</h3>
        <form action="{{ url('/admin/lessons') }}" method="POST">
            @csrf
            <input type="hidden" name="course_id" id="course_id_input">
            <input type="text" name="title" placeholder="عنوان الدرس" required style="width:100%; padding:10px; margin-top:15px;">
            <input type="url" name="video_url" placeholder="رابط اليوتيوب" required style="width:100%; padding:10px; margin-top:10px;">
            <button type="submit" style="width:100%; background:#3498db; color:white; padding:10px; margin-top:15px; border:none; cursor:pointer;">حفظ الدرس</button>
        </form>
    </div>
</div>

<div id="assignmentModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('assignmentModal')">&times;</span>
        <h3>إضافة سؤال للواجب</h3>
        <form action="{{ url('/admin/add-question') }}" method="POST">
            @csrf
            <input type="hidden" name="lesson_id" id="lesson_id_field">
            <textarea name="question_text" placeholder="نص السؤال" required style="width:100%; height:60px; margin-top:15px;"></textarea>
            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:5px; margin-top:10px;">
                <input type="text" name="option_a" placeholder="خيار أ" required>
                <input type="text" name="option_b" placeholder="خيار ب" required>
                <input type="text" name="option_c" placeholder="خيار ج" required>
                <input type="text" name="option_d" placeholder="خيار د" required>
            </div>
            <select name="correct_answer" required style="width:100%; padding:10px; margin-top:10px;">
                <option value="a">الخيار أ</option>
                <option value="b">الخيار ب</option>
                <option value="c">الخيار ج</option>
                <option value="d">الخيار د</option>
            </select>
            <button type="submit" style="width:100%; background:#f1c40f; color:white; padding:10px; margin-top:15px; border:none; cursor:pointer;">حفظ السؤال</button>
        </form>
    </div>
</div>

<div id="quizModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('quizModal')">&times;</span>
        <h3>إضافة اختبار نهائي</h3>
        <form action="{{ url('/admin/quizzes') }}" method="POST">
            @csrf
            <input type="hidden" name="course_id" id="course_id_quiz">
            <input type="text" name="title" placeholder="اسم الاختبار" required style="width:100%; padding:10px; margin-top:15px;">
            <input type="url" name="quiz_link" placeholder="رابط الاختبار" required style="width:100%; padding:10px; margin-top:10px;">
            <button type="submit" style="width:100%; background:#e67e22; color:white; padding:10px; margin-top:15px; border:none; cursor:pointer;">نشر الاختبار</button>
        </form>
    </div>

    {{-- زر إضافة دورة جديدة --}}
<button onclick="openAddCourseModal()" style="background: #27ae60; color: white; border: none; padding: 10px 20px; border-radius: 8px; cursor: pointer; margin-bottom: 20px;">
    <i class="fas fa-plus"></i> إضافة دورة جديدة
</button>

{{-- الأزرار داخل جدول الدورات --}}
<div style="display: flex; gap: 5px;">
    <button title="إضافة درس" style="background: #3498db; color: white; border: none; width: 35px; height: 35px; border-radius: 5px; cursor: pointer;">
        <i class="fas fa-video"></i>
    </button>
    
    <button title="إضافة اختبار نهائي" style="background: #e67e22; color: white; border: none; width: 35px; height: 35px; border-radius: 5px; cursor: pointer;">
        <i class="fas fa-file-signature"></i>
    </button>

    <button title="حذف" style="background: #e74c3c; color: white; border: none; width: 35px; height: 35px; border-radius: 5px; cursor: pointer;">
        <i class="fas fa-trash"></i>
    </button>
</div>

</div>

<div style="background: #ffffff; padding: 30px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); border: 1px solid #e1e8ed; max-width: 800px; margin: 20px auto; direction: rtl; font-family: 'Cairo', sans-serif;">
    <div style="display: flex; align-items: center; margin-bottom: 25px; border-bottom: 2px solid #f1f4f8; padding-bottom: 15px;">
        <i class="fas fa-plus-circle" style="color: #1abc9c; font-size: 1.5rem; margin-left: 10px;"></i>
        <h3 style="color: #2c3e50; margin: 0; font-size: 1.4rem;">إضافة دورة تدريبية جديدة</h3>
    </div>

    <form action="{{ url('/admin/courses/store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="margin-bottom: 20px;">
        <label style="display: block; font-weight: bold; color: #4b5563; margin-bottom: 8px;">اسم الدورة</label>
        <input type="text" name="title" required placeholder="أدخل عنوان الدورة هنا..." 
            style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #d1d5db; outline: none; transition: border-color 0.3s; font-family: inherit;">
    </div>

    <div style="margin-bottom: 20px;">
        <label style="display: block; font-weight: bold; color: #4b5563; margin-bottom: 8px;">وصف الدورة</label>
        <textarea name="description" required placeholder="اكتب وصفاً مختصراً للمحتوى..." rows="4" 
            style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #d1d5db; outline: none; transition: border-color 0.3s; font-family: inherit; resize: vertical;"></textarea>
    </div>

    {{-- خانة رابط الدرس --}}
    <div style="margin-bottom: 20px;">
        <label style="display: block; font-weight: bold; color: #4b5563; margin-bottom: 8px;">رابط درس الدورة (يوتيوب أو غيره)</label>
        <input type="url" name="video_url" placeholder="https://youtube.com/..." 
            style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #d1d5db; outline: none; font-family: inherit;">
    </div>

   {{-- خانة رابط ملف PDF --}}
<div style="margin-bottom: 20px;">
    <label style="display: block; font-weight: bold; color: #4b5563; margin-bottom: 8px;">رابط ملف المقرر (Google Drive أو رابط مباشر)</label>
    <input type="url" name="pdf_url" placeholder="https://example.com/file.pdf" 
        style="width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #d1d5db; outline: none; font-family: inherit;">
</div>

    <div style="background: #f9fafb; padding: 15px; border-radius: 10px; margin-bottom: 25px; display: flex; align-items: center; border: 1px dashed #cbd5e1;">
        <input type="checkbox" name="is_special" value="1" checked id="is_special" style="width: 18px; height: 18px; cursor: pointer; accent-color: #1abc9c;">
        <label for="is_special" style="margin-right: 10px; color: #334155; cursor: pointer; font-weight: 500;">جعل الدورة تظهر في قسم "الدورات التدريبية"</label>
    </div>

    <div style="display: flex; justify-content: flex-end;">
        <button type="submit" style="background: #1abc9c; color: white; border: none; padding: 12px 40px; border-radius: 10px; cursor: pointer; font-size: 1.1rem; font-weight: bold; transition: background 0.3s; box-shadow: 0 4px 6px rgba(26, 188, 156, 0.2);">
            <i class="fas fa-save" style="margin-left: 5px;"></i> حفظ الدورة والدروس
        </button>
    </div>

</form>

</div>

<style>
    .modal { display: none; position: fixed; z-index: 9999; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); }
    .modal-content { background: white; margin: 10% auto; padding: 25px; border-radius: 12px; width: 450px; position: relative; direction: rtl; }
    .close-btn { position: absolute; left: 15px; top: 10px; font-size: 24px; cursor: pointer; color: #999; }
</style>

<script>
    function openModal(id) {
        document.getElementById(id).style.display = 'block';
    }

    function closeModal(id) {
        document.getElementById(id).style.display = 'none';
    }

    function openLessonModal(courseId) {
        document.getElementById('course_id_input').value = courseId;
        openModal('lessonModal');
    }

    function openQuestionModal(lessonId) {
        document.getElementById('lesson_id_field').value = lessonId;
        openModal('assignmentModal');
    }

    function openQuizModal(courseId) {
        document.getElementById('course_id_quiz').value = courseId;
        openModal('quizModal');
    }

    // إغلاق النوافذ عند الضغط خارجها
    window.onclick = function(event) {
        if (event.target.className === 'modal') {
            event.target.style.display = "none";
        }
    }
</script>
@endsection