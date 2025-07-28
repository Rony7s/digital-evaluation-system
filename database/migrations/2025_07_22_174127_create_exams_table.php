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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('examCode')->unique();    // Unique exam identifier
            $table->string('examName');              // Name/title of the exam
            $table->string('teacherEmail');          // Teacher's email
            $table->string('teacherPass');           // Teacher password
            $table->string('studentPass');           // Student password
            $table->dateTime('examStart');           // Use datetime instead of stringDate for better handling
            $table->integer('duration');              // Duration in minutes
            $table->json('questionsIds');            // Store question IDs as JSON array
            $table->text('comment')->nullable();     // Optional comment
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
