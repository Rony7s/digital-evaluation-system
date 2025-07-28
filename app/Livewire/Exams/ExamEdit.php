<?php

namespace App\Livewire\Exams;

use App\Models\Exam;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ExamEdit extends Component
{
    public $examId;
    public $examCode;
    public $examName;
    public $teacherPass;
    public $studentPass;
    public $examStart;
    public $duration;
    public $questionsIdsString;
    public $comment;

    public function mount($id)
    {
        $exam = Exam::findOrFail($id);

        $this->examId = $exam->id;
        $this->examCode = $exam->examCode;
        $this->examName = $exam->examName;
        $this->teacherPass = $exam->teacherPass;
        $this->studentPass = $exam->studentPass;
        $this->examStart = $exam->examStart->format('Y-m-d\TH:i');
        $this->duration = $exam->duration;
        $this->questionsIdsString = implode(',', $exam->questionsIds ?? []);
        $this->comment = $exam->comment;
    }

    public function updateExam()
    {
        $this->validate([
            'examCode' => 'required|string',
            'examName' => 'required|string',
            'teacherPass' => 'required|string',
            'studentPass' => 'required|string',
            'examStart' => 'required|date',
            'duration' => 'required|integer|min:1',
            'questionsIdsString' => 'nullable|string',
            'comment' => 'nullable|string',
        ]);

        $exam = Exam::findOrFail($this->examId);

        $exam->update([
            'examCode' => $this->examCode,
            'examName' => $this->examName,
            'teacherPass' => $this->teacherPass,
            'studentPass' => $this->studentPass,
            'examStart' => $this->examStart,
            'duration' => $this->duration,
            'questionsIds' => array_filter(array_map('intval', explode(',', $this->questionsIdsString))),
            'comment' => $this->comment,
        ]);

        session()->flash('message', 'Exam updated successfully!');
        return redirect()->route('exams.index');
    }

    public function render()
    {
        return view('livewire.exams.exam-edit');
    }
}
