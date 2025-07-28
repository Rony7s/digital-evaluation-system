<?php

namespace App\Livewire\Exams;

use Livewire\Component;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;

class ExamIndex extends Component
{
    public function render()
    {
        $userEmail = Auth::user()->email;

        $exams = Exam::where('teacherEmail', $userEmail)->get();

        return view('livewire.exams.exam-index', [
            'exams' => $exams,
        ]);
    }

    public function deleteExam($id)
    {
        $exam = Exam::find($id);
        if ($exam) {
            $exam->delete();
            session()->flash('message', 'Exam deleted successfully!');
        } else {
            session()->flash('error', 'Exam not found.');
        }
    }
    public function viewExam($id)
    {
        $exam = Exam::find($id);
        if ($exam) {
            return redirect()->route('exams.view', ['exam' => $exam]);
        } else {
            session()->flash('error', 'Exam not found.');
        }
    }

}