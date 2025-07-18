<?php

namespace App\Livewire\Questions;

use Livewire\Component;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class QuestionCreate extends Component
{
    public $questionType;
    public $questionText;
    public $options1;
    public $options2; 
    public $options3;
    public $options4;
    public $rightAnswer;
    public $comment;

    public function createQuestion()
    {
        // Validate the form inputs
        $this->validate([
            'questionType' => 'required|string',
            'questionText' => 'required|string',
            'options1' => 'required|string',
            'options2' => 'required|string',
            'options3' => 'required|string',
            'options4' => 'required|string',
            'rightAnswer' => 'required|string',
            'comment' => 'nullable|string',
        ]);

        // Create the question
        Question::create([
            'email' => Auth::user()->email,
            'questionType' => $this->questionType,
            'questionText' => $this->questionText,
            'option1' => $this->options1,
            'option2' => $this->options2,
            'option3' => $this->options3,
            'option4' => $this->options4,
            'answer' => $this->rightAnswer, // stores a, b, c, or d
            'comment' => $this->comment,
        ]);

        // Reset the form
        $this->questionText = '';
        $this->options1 = '';
        $this->options2 = '';
        $this->options3 = '';
        $this->options4 = '';
        $this->rightAnswer = null;
        $this->comment = '';

        // Flash success message
        session()->flash('message', 'Question added successfully!');
    }

    public function render()
    {
        return view('livewire.questions.question-create');
    }
}
