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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->foreignId('semester_id')->constrained()->onDelete('cascade');
            $table->string('class_code');
            $table->string('group_code')->nullable();
            $table->string('practice_group_code')->nullable();
            $table->tinyInteger('day_of_week'); // 1-7 tương ứng với Thứ 2 - Chủ nhật
            $table->integer('start_period');
            $table->integer('number_of_periods');
            $table->string('weeks_list'); // Danh sách các tuần học, JSON hoặc string
            $table->integer('start_week');
            $table->integer('end_week');
            $table->enum('session_type', ['a', 'b'])->nullable();
            $table->integer('registered_students')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
