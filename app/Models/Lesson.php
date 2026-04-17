<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    // الحقول المسموح بتخزينها في قاعدة البيانات
    protected $fillable = [
        'course_id', 
        'title', 
        'video_url'
    ];

    /**
     * العلاقة مع نتائج الدروس
     * كل درس يمكن أن يكون له العديد من النتائج لطلاب مختلفين
     */
    public function results()
    {
        return $this->hasMany(LessonResult::class);
    }

    /**
     * العلاقة مع الأسئلة (الواجب)
     * كل درس لديه مجموعة من الأسئلة
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * علاقة الدرس بالمقرر
     * كل درس ينتمي لمقرر واحد
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}