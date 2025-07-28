<?php

namespace App\Livewire\Quiz;

use Livewire\Component;
use App\Models\Exam;
use App\Models\QuizData;

class Join extends Component
{
    public $examCode, $studentPass, $studentId;
    public $error;

    public function joinQuiz()
    {
        $this->validate([
            'examCode' => 'required|string',
            'studentPass' => 'required|string',
            'studentId' => 'required|string',
        ]);

        $exam = Exam::where('examCode', $this->examCode)->first();

        if (!$exam || $exam->studentPass !== $this->studentPass) {
            $this->error = "Invalid exam code or student password.";
            return;
        }

        $existing = QuizData::where('exam_code', $this->examCode)
                    ->where('student_id', $this->studentId)
                    ->first();

        if ($existing) {
            $this->error = "You have already joined this quiz.";
            return;
        }

        QuizData::create([
            'exam_code' => $this->examCode,
            'student_id' => $this->studentId,
            'student_email' => null,
            'answer_sheet' => json_encode([]), // or just []
            'comment' => null,
        ]);

        session()->flash('message', 'You have successfully joined the quiz!');
        return redirect()->to('/quiz/start/' . $this->examCode . '/' . $this->studentId);
    }

    public function render()
    {
        return view('livewire.quiz.join');
    }
}
