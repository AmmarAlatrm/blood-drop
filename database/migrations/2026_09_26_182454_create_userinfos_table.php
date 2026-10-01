<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('userinfos', function (Blueprint $table) {
            $table->id();
            // الربط مع جدول المستخدمين
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            $table->string('fullname', 60);
            $table->integer('age');
            $table->string('address', 60);
            $table->string('mobile', 15)->unique(); // يفضل 15 للأرقام الدولية
            $table->string('bloodtype', 10);
            $table->boolean('available')->default(true);

            // الربط مع المستشفى (استخدمنا hospital_id لتوافق لارافيل)
            $table->foreignId('hospital_id')->nullable()->constrained('hospitals')->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('userinfos');
    }
};
