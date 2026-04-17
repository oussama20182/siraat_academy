<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * تشغيل التهجير (إضافة العمود)
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // إضافة عمود is_admin لنعرف هل المستخدم طالب أم مدير
            $table->boolean('is_admin')->default(false)->after('password'); 
        });
    }

    /**
     * التراجع عن التهجير (حذف العمود)
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });
    }
};