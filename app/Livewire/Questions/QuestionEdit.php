<?php

namespace App\Livewire\Questions;

use Livewire\Component;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class QuestionEdit extends Component
{
    public $questionType, $questionText, $options1, $options2, $options3, $options4, $rightAnswer, $comment;
    public $questionId = null;

    protected $rules = [
        'questionType' => 'required',
        'questionText' => 'required|string',
        'options1' => 'required|string',
        'options2' => 'required|string',
        'options3' => 'required|string',
        'options4' => 'required|string',
        'rightAnswer' => 'required|string',
        'comment' => 'nullable|string',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $this->loadQuestion($id);
        }
    }

    public function loadQuestion($id)
    {
        $question = Question::findOrFail($id);
        $this->questionId = $question->id;
        $this->questionType = $question->questionType;
        $this->questionText = $question->questionText;
        $this->options1 = $question->option1;
        $this->options2 = $question->option2;
        $this->options3 = $question->option3;
        $this->options4 = $question->option4;
        $this->rightAnswer = $question->answer;
        $this->comment = $question->comment;
    }

    public function submit()
    {
        $this->validate();

        $data = [
            'questionType' => $this->questionType,
            'questionText' => $this->questionText,
            'option1' => $this->options1,
            'option2' => $this->options2,
            'option3' => $this->options3,
            'option4' => $this->options4,
            'answer' => $this->rightAnswer,
            'comment' => $this->comment,
        ];

        if ($this->questionId) {
            Question::findOrFail($this->questionId)->update($data);
            session()->flash('message', 'Question updated successfully!');
        } else {
            Question::create($data);
            session()->flash('message', 'Question created successfully!');
        }

        return redirect()->route('questions.index');
    }

    public function render()
    {
        return view('livewire.questions.question-edit');
    }
}
