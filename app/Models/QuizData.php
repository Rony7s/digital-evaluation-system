<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizData extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_code',
        'student_id',
        'student_email',
        'answer_sheet',
        'comment',
    ];

    protected $casts = [
        'answer_sheet' => 'array',
    ];
}
