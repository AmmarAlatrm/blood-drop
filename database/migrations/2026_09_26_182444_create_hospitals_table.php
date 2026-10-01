<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            // الربط مع جدول المستخدمين
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            $table->string('name', 60);
            $table->string('city', 60);
            $table->string('address', 60);
            $table->string('mobile', 60)->unique();
            // تم دمج حقل التفعيل هنا وحذف حقل confirm المكرر
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hospitals');
    }
};
