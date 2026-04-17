<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    // السماح بإضافة البيانات لهذه الأعمدة
    protected $fillable = ['title', 'level', 'description'];

    // علاقة المقرر بالدروس (كل مقرر له دروس كثيرة)
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}