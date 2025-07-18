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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('email'); // required by default
            $table->string('questionType');
            $table->text('questionText');
            $table->text('option1');
            $table->text('option2');
            $table->text('option3');
            $table->text('option4');
            $table->string('answer');
            $table->text('comment')->nullable(); // optional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
