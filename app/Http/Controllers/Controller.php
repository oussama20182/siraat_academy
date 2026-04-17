<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\LessonResult;
use App\Models\Lesson;
use App\Models\Course;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * عرض صفحة الواجب للطالب
     */
    public function showAssignment($lesson_id) 
    {
        $lesson = Lesson::findOrFail($lesson_id);
        $questions = Question::where('lesson_id', $lesson_id)->get();

        if($questions->isEmpty()){
            return back()->with('error', 'لا يوجد واجب متاح لهذا الدرس حالياً.');
        }

        return view('take_assignment', compact('lesson', 'questions'));
    }

    /**
     * وظيفة تصحيح الواجب وحساب الدرجة والمحاولات
     */
    public function submitAssignment(Request $request) 
    {
        $user = auth()->user();
        $lessonId = $request->lesson_id;
        
        $result = LessonResult::firstOrCreate(
            ['user_id' => $user->id, 'lesson_id' => $lessonId]
        );

        if ($result->attempts >= 10) {
            return back()->with('error', 'عذراً، لقد استنفدت جميع المحاولات المتاحة لهذا الدرس (10 محاولات).');
        }

        $score = 0;
        $questions = Question::where('lesson_id', $lessonId)->get();
        
        foreach ($questions as $q) {
            if (isset($request->answers[$q->id]) && $request->answers[$q->id] == $q->correct_answer) {
                $score += 2; 
            }
        }

        $result->attempts += 1;

        if ($score > $result->best_score) {
            $result->best_score = $score;
        }

        if ($score >= 5) {
            $result->is_completed = true;
        }
        
        $result->save();

        if ($score >= 5) {
            return redirect()->route('course.show', $lessonId)->with('success', "تهانينا! لقد نجحت بـ $score من 10. (المحاولة رقم: $result->attempts)");
        } else {
            $remaining = 10 - $result->attempts;
            return back()->with('error', "درجتك هي $score من 10. لم تجتز الواجب، حاول مجدداً. المحاولات المتبقية: $remaining");
        }
    }

    /**
     * عرض صفحة تفاصيل المقرر (التي تحتوي على الدروس)
     */
    public function showCourse($id)
    {
        $course = Course::with('lessons')->findOrFail($id);
        return view('course_details', compact('course'));
    }

    /**
     * عرض صفحة كشف الدرجات للطالب
     * تقوم بجلب المقررات مع نتائج الدروس المرتبطة بالطالب الحالي
     */
    public function grades()
    {
        $user = auth()->user();

        // جلب المقررات التي تحتوي على دروس ولها نتائج لهذا الطالب تحديداً
        $courses = Course::with(['lessons.results' => function($query) use ($user) {
            $query->where('user_id', $user->id);
        }])->get();

        return view('grades', compact('courses'));
    }

    public function dashboard()
{
    // جلب الدورات مع عدد الدروس لإرسالها لصفحة الطالب
    $courses = Course::withCount('lessons')->get();
    
    return view('dashboard', compact('courses'));
}
}
