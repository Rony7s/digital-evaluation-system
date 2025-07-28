<?php

namespace App\Livewire\Exams;

use App\Models\Exam;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ExamCreate extends Component
{
    public $examCode;
    public $examName;
    public $teacherPass;
    public $studentPass;
    public $examStart;
    public $duration;
    public $questionsIdsString = '';  // The input string from user
    public $questionsIds = [];        // The parsed array from the string
    public $comment;

    // Update array when string changes
    public function updatedQuestionsIdsString()
    {
        $this->questionsIds = array_filter(
            array_map('trim', explode(',', $this->questionsIdsString)),
            fn($id) => $id !== ''
        );
    }

    public function submit()
    {
        // Make sure $questionsIds is updated before validation
        $this->updatedQuestionsIdsString();

        $this->validate([
            'examCode' => 'required|string|unique:exams,examCode',
            'examName' => 'required|string',
            'teacherPass' => 'required|string',
            'studentPass' => 'required|string',
            'examStart' => 'required|date',
            'duration' => 'required|integer|min:1',
            'questionsIds' => 'required|array|min:1',
            'questionsIds.*' => 'string',  // validate as strings
            'comment' => 'nullable|string',
        ]);

        Exam::create([
            'examCode' => $this->examCode,
            'examName' => $this->examName,
            'teacherEmail' => Auth::user()->email,
            'teacherPass' => $this->teacherPass,
            'studentPass' => $this->studentPass,
            'examStart' => $this->examStart,
            'duration' => $this->duration,
            'questionsIds' => $this->questionsIds,
            'comment' => $this->comment,
        ]);

        $this->reset([
            'examCode',
            'examName',
            'teacherPass',
            'studentPass',
            'examStart',
            'duration',
            'questionsIdsString',
            'questionsIds',
            'comment',
        ]);

        session()->flash('message', 'Exam created successfully!');
    }

    public function render()
    {
        return view('livewire.exams.exam-create');
    }
}
