<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exams';

    protected $fillable = [
        'examCode',
        'examName',
        'teacherEmail',
        'teacherPass',
        'studentPass',
        'examStart',
        'duration',
        'questionsIds',
        'comment',
    ];

    protected $casts = [
        'examCode'     => 'string',
        'examName'     => 'string',
        'teacherEmail' => 'string',
        'teacherPass'  => 'string',
        'studentPass'  => 'string',
        'examStart'    => 'datetime',
        'duration'     => 'integer',
        'questionsIds' => 'array',
        'comment'      => 'string',
    ];
}