<?php

namespace App\Livewire\Quiz;

use Livewire\Component;
use App\Models\Exam;
use App\Models\Question;
use App\Models\QuizData;

class Start extends Component
{
    public $studentId;
    public $examCode;
    public $examName;
    public $duration;
    public $questionsIds = [];
    public $questions = [];
    public $answers = []; // Bind each answer by question ID
    public $comment;

    public function mount($examCode, $studentId)
    {
        $this->examCode = $examCode;
        $this->studentId = $studentId;

        $exam = Exam::where('examCode', $this->examCode)->firstOrFail();
        $this->examName = $exam->examName;
        $this->duration = $exam->duration;
        $this->comment = '';
        $this->questionsIds = $exam->questionsIds; // [1, 3, 4]

        $this->questions = $this->loadQuestions($this->questionsIds);
    }

    public function loadQuestions($Qids)
    {
        return Question::whereIn('id', $Qids)->get();
    }

    public function submitQuiz1()
    {
        $answer_sheet = [];

        foreach ($this->questions as $question) {
            $qid = $question->id;
            $answer_sheet[] = $this->answers[$qid] ?? "";
        }

        QuizData::updateOrCreate(
            ['exam_code' => $this->examCode, 'student_id' => $this->studentId],
            [
                'answer_sheet' => $answer_sheet,
                'comment' => $this->comment ?? '',
            ]
        );

        session()->flash('message', 'Quiz submitted successfully!');
        // return redirect()->route('quiz.start', [
        //     'examCode' => $this->examCode,
        //     'studentId' => $this->studentId,
        // ]);
        return redirect()->route('quiz.join');
    }

    public function render()
    {
        return view('livewire.quiz.start');
    }
}
