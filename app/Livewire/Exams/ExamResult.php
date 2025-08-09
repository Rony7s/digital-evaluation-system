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
    public $analyzedResults = [];
//star function
    function analyzeAnswers($collection, $tCollection) {
    $results = [];

    foreach ($collection as $submission) {
        if (is_string($submission)) {
            $submission = json_decode($submission, true);
        }

        if (!is_array($submission)) continue;

        foreach ($submission as $index => $answer) {
            $answer = strtoupper(trim($answer));
            $answer = in_array($answer, ['A', 'B', 'C', 'D']) ? $answer : 'X';

            if (!isset($results[$index])) {
                $results[$index] = ['A' => 0, 'B' => 0, 'C' => 0, 'D' => 0, 'X' => 0];
            }

            $results[$index][$answer]++;
        }
    }

    // Add raw value from $tCollection[index] as 'R'
    foreach ($results as $index => &$position) {
        $position['R'] = isset($tCollection[$index]) ? $tCollection[$index] : null;
    }

    return $results;
}


//end function

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

        //How many students took the same option 
        $sdata = $quizzes->pluck('answer_sheet');
        $tdata = $tAnswers;
        // Debug output
        //i want to see the sdata every single position which letter how many 
       // dd($this->analyzeAnswers($sdata));

       $this->analyzedResults = $this->analyzeAnswers($sdata, $tdata);





         //End

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
                'total' => count($teacherAnswers),
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
