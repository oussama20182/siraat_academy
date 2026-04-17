<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use App\Models\LessonResult;
use App\Models\Question;
use App\Models\Enrollment;

class AdminController extends Controller
{
    /**
     * عرض لوحة تحكم المدير مع الإحصائيات الشاملة والاشتراكات ونتائج الطلاب
     */
    public function dashboard()
    {
        // 1. إحصائيات الطلاب (كل من ليس مديراً)
        $studentsCount = User::where('is_admin', 0)->count();

        // 2. إحصائيات المقررات والدروس
        $courses = Course::withCount('lessons')->get();
        $lessonsCount = Lesson::count();

        // 3. إحصائيات الواجبات: نحسب الدروس التي تحتوي على أسئلة
        $assignmentsCount = Lesson::has('questions')->count();
        
        // 4. إحصائيات الاختبارات
        $examsCount = 0; 

        // 5. جلب آخر 10 نتائج للطلاب (الواجبات)
        $recentResults = LessonResult::with(['user', 'lesson.course'])
            ->orderBy('updated_at', 'desc')
            ->take(10)
            ->get();

        // 6. جلب سجل اشتراكات الطلاب في الدورات (الجديد)
        $enrollments = Enrollment::with(['user', 'course'])->latest()->get();

        return view('admin.dashboard', compact(
            'studentsCount', 
            'courses', 
            'lessonsCount', 
            'assignmentsCount', 
            'examsCount',
            'recentResults',
            'enrollments'
        ));
    }

    /**
     * حفظ مقرر جديد
     */
     public function storeCourse(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'pdf_url' => 'nullable|url',
    ]);

    $course = new \App\Models\Course();
    $course->title = $request->title;
    $course->description = $request->description;
    $course->is_special = $request->has('is_special');
    
    // حل مشكلة الخطأ: إعطاء قيمة افتراضية للحقول المطلوبة في القاعدة
    $course->level = 'مبتدئ'; 
    $course->pdf_path = $request->pdf_url; 

    $course->save();

    return redirect()->back()->with('success', 'تمت إضافة الدورة بنجاح');
}

    /**
     * حفظ درس جديد
     */
    public function storeLesson(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'video_url' => 'nullable|url',
        ]);

        Lesson::create([
            'course_id' => $request->course_id,
            'title' => $request->title,
            'video_url' => $request->video_url,
        ]);

        return back()->with('success', 'تم نشر الدرس بنجاح.');
    }

    /**
     * إضافة سؤال للواجب
     */
    public function storeQuestion(Request $request) 
    {
        Question::create([
            'lesson_id' => $request->lesson_id,
            'question_text' => $request->question_text,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'correct_answer' => $request->correct_answer,
        ]);

        return back()->with('success', 'تم إضافة السؤال بنجاح!');
    }

    /**
     * عرض تفاصيل المقرر
     */
    public function show($id)
    {
        $course = Course::with('lessons')->findOrFail($id);
        return view('course_details', compact('course'));
    }

    /**
     * حذف مقرر
     */
    public function destroyCourse($id) 
    {
        Course::findOrFail($id)->delete();
        return back()->with('success', 'تم الحذف');
    }
}