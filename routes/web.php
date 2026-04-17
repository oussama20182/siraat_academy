<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;

// الصفحة الرئيسية مع الإحصائيات
Route::get('/', function () {
    return view('welcome', [
        'studentsCount' => User::where('is_admin', 0)->count(),
        'coursesCount' => Course::count(),
        'certificatesCount' => 0
    ]);
});

// المسارات العامة (متاحة للجميع)
Route::get('/about', function () { return view('about'); });
Route::get('/program', function () { return view('program'); });
Route::get('/system', function () { return view('system'); });
Route::get('/special-courses', [CourseController::class, 'indexSpecial']); // نقل خارج الـ middleware ليكون متاحاً للزوار

// الدخول والتسجيل
Route::get('/login', function () { return view('login'); })->name('login');
Route::get('/register', function () { return view('register'); })->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- لوحة الإدارة (للمدير فقط) ---
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::post('/admin/courses/store', [AdminController::class, 'storeCourse']);
    Route::post('/admin/lessons', [AdminController::class, 'storeLesson']);
    Route::post('/admin/add-question', [AdminController::class, 'storeQuestion']);
});

// --- لوحة الطالب ومحتوى الدراسة (للمسجلين فقط) ---
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
    Route::get('/grades', [Controller::class, 'grades']);

    // عرض المقررات للمستوى التمهيدي
    Route::get('/program/introductory', function () {
        $courses = Course::where('level', 'introductory')->withCount('lessons')->get();
        return view('introductory', compact('courses'));
    });

    // عرض دروس مقرر معين
    Route::get('/course/{id}', [Controller::class, 'showCourse'])->name('course.show');

    // مسارات الواجبات
    Route::get('/assignment/{lesson_id}', [Controller::class, 'showAssignment']);
    Route::post('/submit-assignment', [Controller::class, 'submitAssignment']);
});