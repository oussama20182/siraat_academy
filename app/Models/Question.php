<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    // السماح بإدخال هذه البيانات لقاعدة البيانات
    protected $fillable = [
        'lesson_id', // أو assignment_id حسب ما اعتمدت
        'question_text',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer'
    ];

    // علاقة السؤال بالدرس
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}