<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * تشغيل التهجير لإنشاء جدول الأسئلة.
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            // ربط السؤال بالدرس (إذا حذف الدرس تحذف أسئلته تلقائياً)
            $table->foreignId('lesson_id')->constrained()->onDelete('cascade'); 
            
            $table->text('question_text'); // نص السؤال
            $table->string('option_a');   // الخيار الأول
            $table->string('option_b');   // الخيار الثاني
            $table->string('option_c');   // الخيار الثالث
            $table->string('option_d');   // الخيار الرابع
            
            // تخزين الحرف الذي يمثل الإجابة الصحيحة (a, b, c, d)
            $table->string('correct_answer'); 
            
            $table->timestamps(); // تاريخ الإنشاء والتحديث
        });
    }

    /**
     * التراجع عن التهجير (حذف الجدول).
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};