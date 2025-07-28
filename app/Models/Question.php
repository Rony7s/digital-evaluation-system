<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'email',
        'questionType',
        'questionText',
        'option1',
        'option2',
        'option3',
        'option4',
        'answer',
        'comment',
    ];

    protected $casts = [
        'email' => 'string',
        'questionType' => 'string',
        'questionText' => 'string',
        'option1' => 'string',
        'option2' => 'string',
        'option3' => 'string',
        'option4' => 'string',
        'answer' => 'string',
        'comment' => 'string',  // fixed here
    ];

    
}
