<?php

namespace App\Livewire\Questions;

use Livewire\Component;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class QuestionIndex extends Component
{
    public function render()
    {
        $userEmail = Auth::user()->email;

        $questions = Question::where('email', $userEmail)
            ->orWhere('questionType', 'public')
            ->get();

        return view('livewire.questions.question-index', [
            'questions' => $questions,
        ]);
    }

    public function deleteQuestion($id)
    {
        $question = Question::find($id);
        if ($question) {
            $question->delete();
            session()->flash('message', 'Question deleted successfully!');
        } else {
            session()->flash('error', 'Question not found.');
        }
    }
}
