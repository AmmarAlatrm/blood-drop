<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            // الربط مع المشفى الذي نشر الإعلان
            $table->foreignId('hospital_id')->constrained('hospitals')->cascadeOnDelete();

            $table->string('neededbloodtype', 10);
            $table->date('timestamp')->default(Carbon::now());
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
