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
        Schema::create('quiz_data', function (Blueprint $table) {
            $table->id();
            $table->string('exam_code');
            $table->string('student_id');
            $table->string('student_email')->nullable();
            $table->json('answer_sheet')->nullable(); // Stores question IDs or answers
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->unique(['exam_code', 'student_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_data');
    }
};
