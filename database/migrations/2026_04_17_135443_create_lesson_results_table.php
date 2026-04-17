<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lesson_results', function (Blueprint $table) {
            $table->id();
            // ربط النتيجة بالطالب والدرس
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('lesson_id')->constrained()->onDelete('cascade');
            
            $table->integer('attempts')->default(0); // عداد المحاولات (الحد 10)
            $table->integer('best_score')->default(0); // أفضل درجة (من 10)
            $table->boolean('is_completed')->default(false); // حالة النجاح (5+)
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lesson_results');
    }
};