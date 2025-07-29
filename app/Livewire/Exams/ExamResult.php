<?php

namespace App\Livewire\Exams;

use Livewire\Component;
use App\Models\Exam;
use App\Models\Question;
use App\Models\QuizData;

class ExamResult extends Component
{
    
    public $examCode;
    public $examName;

    public $questionsIdsAnswer = [];
    public $results = [];

    public function mount($id)
    {
        $exam = Exam::find($id);

        if (!$exam) {
            abort(404, 'Exam not found.');
        }

        $this->examName = $exam->examName;
        $this->examCode = $exam->examCode;

        $questionsIds = $exam->questionsIds;

        $teacherAnswers = Question::whereIn('id', $questionsIds)->pluck('answer', 'id')->toArray();
        $tAnswers = array_map('strtoupper', array_values($teacherAnswers));


 
 

        // Fetch all quiz submissions for this exam code
        $quizzes = QuizData::where('exam_code', $this->examCode)->get();
        if ($quizzes->isEmpty()) {
            $this->results = [];
            return;
        }

        $unsortedResults = [];

        foreach ($quizzes as $quiz) {
    
            $score = 0;
            $studentAnswers = $quiz->answer_sheet; // assuming already decoded array
            $teacherAnswers = $tAnswers;

            for ($i = 0; $i < count($teacherAnswers); $i++) {
                if (isset($studentAnswers[$i]) && strtolower($studentAnswers[$i]) === strtolower($teacherAnswers[$i])) {
                    $score++;
                }
            }

            $unsortedResults[] = [
                'student_id' => $quiz->student_id,
                'student_email' => $quiz->student_email ?? 'N/A',
                'score' => $score,
                'total' => 11,
                'comment' => $quiz->comment ?? '',
            ];
        }

        // Sort results by score descending
        usort($unsortedResults, fn($a, $b) => $b['score'] <=> $a['score']);
        $this->results = $unsortedResults;
    }

    public function render()
    {
        return view('livewire.exams.exam-result');
    }
}
