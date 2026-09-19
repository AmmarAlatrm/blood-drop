<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->index('userid');
            $table->index('hospitalid');
            $table->date('dondate')->notnull();
            $table->integer('volume')->notnull();
            $table->foreignId('userid')->references('id')->on('userinfos');
            $table->foreignId('hospitalid')->references('id')->on('hospitals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
