<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('userinfos', function (Blueprint $table) {
            $table->id();
            $table->string('fullname',60);
            $table->string('username',60)->unique();
            $table->string('password',60);
            $table->bigInteger('hospitalid',false ,true);
            $table->integer('age');
            $table->string('address',60);
            $table->string('mobile',10)->unique();
            $table->string('bloodtype',10);
            $table->tinyInteger('available',false,true)->default('1');
            $table->foreignId('hospitalid')->references('id')->on('hospitals');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userinfos');
    }
};
