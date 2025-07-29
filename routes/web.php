<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Livewire\Questions\QuestionIndex;
use App\Livewire\Questions\QuestionCreate;
use App\Livewire\Questions\QuestionEdit;

use App\Livewire\Exams\ExamIndex;
use App\Livewire\Exams\ExamCreate;
use App\Livewire\Exams\ExamEdit;
use App\Livewire\Exams\ExamResult;

use App\Livewire\Quiz\Join;
use App\Livewire\Quiz\Start;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('questions', QuestionIndex::class)->name('questions.index');
    Route::get('create', QuestionCreate::class)->name('questions.create');
    Route::get('edit/{id}', QuestionEdit::class)->name('questions.edit');

    Route::get('exam/index', ExamIndex::class)->name('exams.index');
    Route::get('exam/create', ExamCreate::class)->name('exam.create');
    Route::get('exam/edit/{id}', ExamEdit::class)->name('exam.edit');
    Route::get('exam/result/{id}', ExamResult::class)->name('exam.result');



    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// For Quiz 
Route::get('/quiz/join', Join::class)->name('quiz.join');
Route::get('/quiz/start/{examCode}/{studentId}', Start::class)->name('quiz.start');


require __DIR__.'/auth.php';
