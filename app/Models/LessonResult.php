<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonResult extends Model
{
    use HasFactory;

    // هذا السطر هو الحل: نخبر لارافل أن هذه الأعمدة مسموح تعبئتها تلقائياً
    protected $fillable = [
        'user_id',
        'lesson_id',
        'attempts',
        'best_score',
        'is_completed',
    ];

    /**
     * علاقة النتيجة بالطالب
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * علاقة النتيجة بالدرس
     */
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}