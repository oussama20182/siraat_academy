<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function indexSpecial()
    {
        // جلب الدورات التي تم تعليمها كدورة خاصة فقط
        $specialCourses = Course::where('is_special', true)->get();
        
        return view('courses_index', compact('specialCourses'));
    }
}