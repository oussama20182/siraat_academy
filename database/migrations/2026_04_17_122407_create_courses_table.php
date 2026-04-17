<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
{
    Schema::create('courses', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // عنوان المقرر
        $table->text('description')->nullable(); // وصف المقرر (اختياري)
        $table->string('level'); // تمهيدي، متوسط، متقدم
        $table->timestamps(); // تاريخ الإنشاء والتحديث
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
